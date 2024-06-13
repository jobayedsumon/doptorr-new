<!-- Country Edit Modal -->
<div class="modal fade" id="editLevelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Edit Level') }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.level.edit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="level_id" id="level_id" value="">
                <div class="modal-body">
                    <x-form.text :title="__('Level')" :type="__('text')" :name="'edit_level'" :id="'edit_level'" :value="''" :placeholder="__('Enter level name')"/>
                    <x-backend.image :title="__('')" :name="'image'" :dimentions="__('100x100(optional)')"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-btn.submit :title="__('Update')" :class="'btn btn-primary mt-4 pr-4 pl-4 update_level'"/>
                </div>
            </form>
        </div>
    </div>
</div>
