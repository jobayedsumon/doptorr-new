<!-- Country Edit Modal -->
<div class="modal fade" id="editProjectPromotSettingsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Edit Project Promotion Settings') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.project.promote.settings.edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="settings_id" id="settings_id" value="">
                <div class="modal-body">
                    <x-form.text :title="__('Title')" :type="__('text')" :name="'title'" :id="'edit_title'" :value="''" :placeholder="__('Enter title')"/>
                    <x-form.text :title="__('Duration - days')" :type="__('text')" :name="'duration'" :id="'edit_duration'" :value="''" :placeholder="__('Enter duration')"/>
                    <x-form.text :title="__('Budget')" :type="__('text')" :name="'budget'" :id="'edit_budget'" :value="''" :placeholder="__('Enter budget')"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-btn.submit :title="__('Update')" :class="'btn btn-primary mt-4 pr-4 pl-4 update_project_promote_settings'"/>
                </div>
            </form>
        </div>
    </div>
</div>
