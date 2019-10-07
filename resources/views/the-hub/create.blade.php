{{-- modal --}}
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h4 class="modal-title">Create new Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5">
                <form action="{{action("HubController@store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="title">Title:</label> --}}
                        <input type="text" class="form-control" name="title" aria-describedby="emailHelp"
                            placeholder="Enter Post Title">
                    </div>
                    <div class="form-group">
                        {{-- <label for="description">Description:</label> --}}
                        <textarea class="form-control" name="description" rows="3"
                            placeholder="Enter Post description"></textarea>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image[]" id="customFile" multiple>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
                aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h4 class="modal-title">Create new Post</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body px-5">
                            <form action="{{action("HubController@store")}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" name="title" aria-describedby="emailHelp"
                                        placeholder="Enter Post Title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" name="description" rows="3"
                                        placeholder="Enter Post description"></textarea>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image[]" id="customFile"
                                        multiple>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>