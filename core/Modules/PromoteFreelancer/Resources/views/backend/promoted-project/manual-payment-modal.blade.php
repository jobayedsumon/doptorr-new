<!-- Country Edit Modal -->
<div class="modal fade" id="editPaymentGatewayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Complete Payment Status') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.project.promote.payment.status')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="promoted_project_list_id" id="promoted_project_list_id">
                <input type="hidden" name="promoted_project_user_id" id="promoted_project_user_id">

                <div class="modal-body">
                    <x-notice.general-notice :description="__('Notice: Once the payment status has been marked as completed, it cannot be reversed.')" />
                    <p class="manual_payment_image_display">{{ __('Payment Document') }}
                        <img class="manual_payment_img mt-3" src="" alt="{{ __('Manual Payment Image') }}">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-btn.submit :title="__('Complete Payment')" :class="'btn btn-primary mt-4 pr-4 pl-4'" />
                </div>
            </form>
        </div>
    </div>
</div>
