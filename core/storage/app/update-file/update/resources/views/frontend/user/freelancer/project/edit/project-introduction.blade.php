<!-- Project Introduction Start -->
<div class="setup-wrapper-contents active">
    <div class="create-project-wrapper-item">
        <div class="create-project-wrapper-item-top profile-border-bottom">
            <h4 class="create-project-wrapper-title">{{ __('Project Intro') }}</h4>
        </div>
        <div class="create-project-intro-contents">
            <div class="create-project-intro-contents-form custom-form">

                <div class="single-input mt-3">
                    <label class="label-title">{{ __('Select Category') }}</label>
                    <select name="category" id="category" class="form-control category_select2">
                        @foreach(\Modules\Service\Entities\Category::all_categories() as $data)
                            <option value="{{ $data->id }}" @if($project_details->category_id == $data->id) selected @endif>{{ $data->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="single-input">
                    <label class="label-title">{{ __('Select Subcategory') }}</label>
                    <select name="subcategory[]" id="subcategory" class="form-control get_subcategory subcategory_select2" multiple>
                        @foreach ($get_sub_categories_from_project_category as $subcategory)
                            <option
                                @foreach($project_details->project_sub_categories as $project_subcategory)
                                    {{$project_subcategory->id === $subcategory->id ? 'selected' :''}}
                                @endforeach
                                value="{{ $subcategory->id }}">{{ $subcategory->sub_category }}
                            </option>
                        @endforeach
                    </select>
                    <span id="subcategory_info"></span>
                </div>
               <x-form.text :title="__('What are you offering to clients?')" :type="'text'" :id="'project_title'" :name="'project_title'" :divClass="'mb-0'" :class="'form--control'" :value="$project_details->title ?? old('project_title')" :placeholder="__('You’ll get a Mobile application designed')" />
                <span id="project_title_char_length_check"></span>
                <x-form.text :title="__('Slug')" :type="'text'" :id="'slug'" :name="'slug'" :divClass="'mb-0'" :class="'form--control d-none'" :labelClass="'d-none display_label_title'" :value="$project_details->slug ?? old('slug')" :placeholder="__('Slug')" />

                <div class="mb-4">
                    <strong>{{ __('Slug:') }}</strong>
                    <span class="display_project_slug"></span>
                    <span class="full-slug-show"></span>
                    <span class="edit_project_slug"><i class="fas fa-edit"></i></span>
                </div>

                <x-form.summernote
                    :title="__('Write a description about your service')"
                    :name="'project_description'"
                    :id="'project_description'"
                    :rows="'10'" :cols="30"
                    :value="$project_details->description ?? old('project_description')"
                />
                <span id="project_description_char_length_check"></span>

            </div>
        </div>
    </div>
</div>
<!-- Project Introduction Ends -->
