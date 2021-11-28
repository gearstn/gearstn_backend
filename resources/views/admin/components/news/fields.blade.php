<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ form::label('title','English Title')}}
            {{form::text('title', $news->title ,['class'=>'form-control','placeholder'=>'English Title'])}}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {{ form::label('post_date','Post Date')}}
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                {{form::text('post_date', $news->post_date ,['class'=>'form-control float-right','id'=>'reservationdate'])}}
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ form::label('image_url','Image Link')}}
            {{form::text('image_url', $news->image_url ,['class'=>'form-control','placeholder'=>'Image Link'])}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ form::label('bodytext','Body Text')}}
            {{form::textarea('bodytext',$news->bodytext,['class'=>'ckeditor form-control','style'=>'width: 100%'])}}
            {{-- <textarea class="ckeditor form-control" value = "{{ $news->bodytext }}" name="bodytext"
                      style="width: 100%"></textarea> --}}
        </div>
    </div>
</div>
