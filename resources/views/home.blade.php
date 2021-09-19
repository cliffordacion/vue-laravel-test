@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="button-containers">
                <div>
                    <b-button v-b-modal.modal-part-upload variant="primary">Upload Part</b-button>
                  
                    <b-modal id="modal-part-upload" title="Upload Part" ok-only ok-variant="secondary" ok-title="Cancel">
                        <part-upload-component></part-upload-component>
                    </b-modal>
                </div>
    
                <a class="btn btn-secondary" href="/home">Generate Faces</a> 
            </div>

            <part-combination-component></part-combination-component>
        </div>
    </div>
</div>
<br/>
@endsection
