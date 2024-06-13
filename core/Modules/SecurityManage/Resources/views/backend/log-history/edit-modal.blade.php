<!-- State Edit Modal -->
<div class="modal fade" id="editWordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Edit Word') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.word.edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="word_id" id="word_id" value="">

                <div class="modal-body">
                    <x-form.text :title="__('Word')" :type="__('text')" :name="'edit_word'" :id="'edit_word'" :placeholder="__('Enter word')"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-btn.submit :title="__('Update')" :class="'btn btn-primary mt-4 pr-4 pl-4 edit_skill'" />
                </div>
            </form>
        </div>
    </div>
</div>
