<div class="modal fade" id="competitionModal" tabindex="-1" role="dialog" aria-labelledby="competitionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="competitionModalLabel">Creating new Competition!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="competitionForm" class="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row mt-2">
                        <label for="title" class="col-12 col-form-label">
                            Competition title:
                            <div class="col-12 px-0">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required placeholder="title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </label>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="year" class="col-12 col-form-label">
                            Competition Year:
                            <div class="col-12 px-0">
                                <input id="year" type="number" name="year" class="form-control @error('year') is-invalid @enderror" min="1900" max="2099" step="1" value="2020" required/>
                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </label>
                    </div>
                    <div class="custom-image-input form-group row mt-2">
                        <span id="directive" data-value="" class="col-6">Competition Directive:
                            <span id="competition-direcitive"></span>
                        </span>
                        <span class="col display-4" id="directive_icon" data-value="">
                            <i class="fas fa-times text-danger display-4"></i>
                        </span>
                        <input type="file" name="file" id="directive_file" accept=".pdf" class="d-none" />
                    </div>
                    <div class="custom-image-input form-group row mt-2">
                        <span class="col-12">Competition Poster:
                            <span id="image-title">
                                default.jpg
                            </span>
                        </span>
                        <img class="col-4 offset-4 btn inputImage" src="/storage/images/poster.jpg"/>
                        <input type="file" name="image" id="image" accept="image/*" class="d-none" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
