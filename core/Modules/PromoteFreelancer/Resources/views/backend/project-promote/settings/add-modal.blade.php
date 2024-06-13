<!-- Level Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Add Project Promotion Settings') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.project.promote.settings')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <x-form.text :title="__('Title')" :type="__('text')" :name="'title'" :id="'title'" :placeholder="__('Enter title')"/>
                    <x-form.text :title="__('Duration - days')" :type="__('number')" :name="'duration'" :id="'duration'" :placeholder="__('Enter duration')"/>
                    <x-form.text :title="__('Budget')" :type="__('number')" :name="'budget'" :id="'budget'" :placeholder="__('Enter budget')"/>
                    <x-form.active-inactive :title="__('Select Status')" :info="__('If you select inactive the settings will not be display publicly')" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-btn.submit :title="__('Save')" :class="'btn btn-primary mt-4 pr-4 pl-4 add_project_promote_settings'" />
                </div>
            </form>
        </div>
    </div>
</div>
