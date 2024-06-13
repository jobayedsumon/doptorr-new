
<script>
    <?php if(request()->has('client_id')): ?>
    $(document).ready(function (){
        $('.chat_item[data-client-id=<?php echo e(request()->client_id); ?>]').trigger('click').addClass("active")
    })
    <?php endif; ?>
    /*
    ========================================
        Chat Click and Active Class
    ========================================
    */
    let oldChannelName = "";
    let liveChat, channelName;
    liveChat = new LiveChat();

    $(document).on('click', '.chat_item', function() {
        //: first need to remove all active class and after that add active class to clicked item
        $(this).siblings().removeClass('active');
        $('#freelancer-message-footer').removeClass('d-none');
        $(this).addClass('active');
        $('.chat_wrapper__contact__close, .body-overlay').removeClass('active');
        //: now fetch all old conversation from request with header and body
        fetch_chat_data($(this).attr("data-client-id"));

        $("#chat_body").attr("data-current-user", $(this).attr("data-client-id"))

        channelName = {
            client_id: $(this).attr("data-client-id"),
            freelancer_id: "<?php echo e(auth('web')->id()); ?>",
            type: "freelancer"
        };

        if(client_list["client_id_" + channelName.client_id] != true){

            //: initialize livechat js
            liveChat.createChannel(channelName.client_id,channelName.freelancer_id, channelName.type);

            liveChat.bindEvent('livechat-client-' + channelName.client_id, function (data){
                if($("#chat_body").attr("data-current-user") == data.livechat?.client?.id) {
                    $("#chat_body").append(data.messageBlade);

                    scrollToBottom();
                }

                if (document.getElementById("chat-alert-sound") != undefined){
                    var alert_sound = document.getElementById("chat-alert-sound");
                    alert_sound.play();
                }
            });

            client_list["client_id_" + channelName.client_id] = true;
            oldChannelName = channelName;
        }

        $(this).find(".chat_wrapper__contact__list__time .badge").fadeOut();
    });

    $(document).on("click","#freelancer-send-message-to-client", function (){
        //: prepare chat post data
        let file = $('#freelancer-message-footer #message-file')[0].files[0];
        let form = new FormData();
        form.append('message', $('#freelancer-message-footer #message').val());
        form.append('file', file !== undefined ? file : '');
        form.append('from_user', '2');
        form.append('client_id', $("#livechat-message-header").attr('data-client-id'));
        form.append('from', "chatbox");
        form.append('_token', "<?php echo e(csrf_token()); ?>");

        let messages_ = $('#freelancer-message-footer #message').val();


        <?php if(moduleExists('SecurityManage')): ?>
            //get security manage module name
            let module_exits = "<?php echo moduleExists('SecurityManage') ?? '' ?>"
            if(module_exits){
                let words = JSON.parse('<?php echo json_encode(\Modules\SecurityManage\Entities\Word::select('word')->where("status", "active")->pluck("word")->toArray()); ?>');

                // Function to check if any word exists in the string
                function checkAnyWordExists(words, messages_) {
                    return words.some(word => messages_.includes(word));
                }
                // Check if any of the words exist in the string
                let anyWordExists = checkAnyWordExists(words, messages_);

                // Function to get all matching words in the string
                function getAllMatchedWords(words, message) {
                    return words.filter(word => message.includes(word));
                }
                // Get all matching words
                let matchedWords = getAllMatchedWords(words, messages_);

                if(anyWordExists){
                    toastr_warning_js('You can not send restricted words:' + matchedWords);
                    return false;
                }
            }
        <?php endif; ?>

        if(messages_ != '' || file !== undefined){
            $('#freelancer-message-footer #message').val('');
            $('#freelancer-message-footer #message-file').val('');
            $('#freelancer-message-footer .show_uploaded_file').text('');

            send_ajax_request("post", form, "<?php echo e(route("freelancer.message.send")); ?>", function (){}, function (response){
                $("#chat_body").append(response);
                scrollToBottom();
            }, function (){})
        }else{
            return false;
        }
    });


    $(document).on("click",".load-more-pagination", function (){
        let el = $(this);
        let page = parseInt(el.attr('data-page'));
        let nextPage = page + 1;

        fetch_chat_data($('#livechat-message-header').attr('data-client-id'), nextPage, function (){
            el.attr("data-page",nextPage);
        });
    });

    function fetch_chat_data(client_id, page = 1, callback){
        //: hare call a api for fetching data from database if no data available then new item will be inserted
        let formData;

        formData = new FormData();
        formData.append("client_id", client_id);
        formData.append("_token", "<?php echo e(csrf_token()); ?>");
        formData.append("from_user", 2)

        send_ajax_request("post", formData,`<?php echo e(route("freelancer.fetch.chat.client.record")); ?>?page=${page}`,function (){

        }, function (response){
            $('.unseen_message_count_'+client_id).addClass("d-none")
            $('.reload_unseen_message_count').load(location.href + ' .reload_unseen_message_count')

            if(page > 1) {
                $("#chat_body").children().not(":first").prepend(response.body);
            }else{

                let loadmore = `
                            <div class="pagination d-flex justify-content-center mb-3">
                                <button data-page="1" class="btn btn-info load-more-pagination"><?php echo e(__("Load More")); ?></button>
                            </div>`;

                $("#chat_body").html((response.allow_load_more ? loadmore : '') + response.body);

                $("#chat_header").html(response.header);

                scrollToBottom();
            }

            $("#vendor-message-footer").removeClass("d-none");
            $("#chat_header").removeClass("d-none");

            if (typeof callback === "function") {
                callback();
            }
        }, function (){

        })
    }

    function scrollToBottom(){
        const scrollingElement = (document.querySelector("#chat_body") || document.body);
        let scrollSmoothlyToBottom = document.querySelector("#chat_body");

        $(scrollingElement).animate({
            scrollTop: scrollSmoothlyToBottom.scrollHeight,
        }, 500);
    }

    (function (){
        /*
        ========================================
            Attach File js
        ========================================
        */

        let uploadImage = document.querySelector(".show_uploaded_file");
        let inputTag = document.querySelector(".inputTag");

        if(inputTag != null) {
            inputTag.addEventListener('change', ()=> {

                let inputTagFile = document.querySelector(".inputTag").files[0];

                uploadImage.innerText = inputTagFile.name;
            });
        };
    })();

    //toastr warning
    function toastr_warning_js(msg){
        Command: toastr["warning"](msg, "Warning !")
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
</script>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Chat/Resources/views/components/freelancer/freelancer-chat-js.blade.php ENDPATH**/ ?>