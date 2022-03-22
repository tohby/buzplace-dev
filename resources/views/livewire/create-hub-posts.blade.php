<div class="card mb-3 border-0 shadow">
    <div class="card-body">
        <form wire:submit.prevent="save">
            {{-- The Master doesn't talk, he acts. --}}
            <div class="row align-items-center">
                <div class="col">
                    <div class="form-group">
                        <textarea name="description" class="form-control form-control-flush form-control-auto" data-toggle="autosize" rows="3"
                            placeholder="Start a post..."
                            style="overflow: hidden; overflow-wrap: break-word; height: 69px;"
                            wire:model="description"></textarea>
                    </div>
                    {{-- Preview --}}
                    @if ($photos)
                        <div class="row row-cols-auto my-4">
                            @foreach ($photos as $photo)
                                <div class="col img-preview mb-3" wire:key="{{ $loop->index }}">
                                    <img src="{{ $photo->temporaryUrl() }}"
                                        class="img-fluid img-thumbnail rounded img">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click="removeMe({{ $loop->index }})"><img
                                                src="{{ asset('/svg/icons/Trash Bin.svg') }}" class="me-1"
                                                alt=""></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @endif

                    @if (!$photos && !$description)
                        @error('description')
                            <span class="invalid-feedback d-block p-2">{{ $message }}</span>
                        @enderror
                    @endif
                    <!-- Icons -->
                    <div class="row align-items-center mt-3">
                        <div class="col">
                            <div id="upload">
                                <label for="images" class="text-reset mr-3 upload">
                                    <img src="{{ asset('/svg/icons/Image.svg') }}" class="me-1" alt="">
                                    Photo
                                </label>
                                <input id="images" name="photos" type="file" class="d-none" multiple
                                    accept="image/*" wire:model="photos" />
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" type="submit" wire:loading.attr="disabled"
                                wire:target="save">
                                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"
                                    wire:loading wire:target="save"></span>
                                <img src="{{ asset('/svg/icons/Rocket-light.svg') }}" class="me-1" alt=""
                                    wire:loading.remove wire:target="save"> Submit
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
