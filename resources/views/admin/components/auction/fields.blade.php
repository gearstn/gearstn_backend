<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ form::label('title_en','English Title')}}
            {{form::text('title_en', $auction->title_en ,['class'=>'form-control','placeholder'=>'English Title'])}}
        </div>
    </div>
    <div class="col-sm-6">
        <!-- textarea -->
        <div class="form-group">
            {{ form::label('title_ar','Arabic Title')}}
            {{form::text('title_ar', $auction->title_ar ,['class'=>'form-control','placeholder'=>'Arabic Title'])}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {{ form::label('country','Country')}}
            {{form::text('country', $auction->country ,['class'=>'form-control','placeholder'=>'Country'])}}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="form-group" id="start_date" >
                <label>Start Date</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#reservationdate">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="form-group" id="end_date" >
                <label>End Date</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#reservationdate">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



