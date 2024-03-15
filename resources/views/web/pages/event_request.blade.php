@extends('web.layouts.default')
@section('content')
<style>
    .fee{
        display:none;
    }
    .radiofull{
        display:none;
    }
</style>
    <!-- Breadcrumb Start -->
    <section class="section_breadcrumb event_calendar_bg" style="
    background: linear-gradient(90deg, rgba(7, 27, 52, 0.80) 0%, rgba(7, 27, 52, 0.61) 51.46%, rgba(7, 27, 52, 0.42) 99.24%, rgba(7, 27, 52, 0.28) 99.7%, rgba(7, 27, 52, 0.00) 100%), url({{ asset('assets/web/images/' . $banner->image) }}) center no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb_title">{{$banner->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$banner->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Event Request Form Start -->
    <section class="section_block request_form">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="section_title" data-aos="fade-up" data-aos-duration="1000">{{$title->title}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('charge.event') }}" id="event_request" data-aos="zoom-in" method="post" data-aos-duration="1000"
                    role="form" 
                    class="require-validation"
                    data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_PUBLISH_KEY') }}">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                    <input type="text" name="title" value="{{ session('eventRequestData.title') }}" class="form-control" placeholder="Event Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                <select name="event_category" class="form-select">
                                    <option selected disabled>Event Category</option>
                                    @foreach ($eventCategory as $level) 
                                        <option value="{{ $level->dropdowns }}" {{ session('eventRequestData.event_category') == $level->dropdowns ? 'selected' : '' }}>{{ $level->dropdowns }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group errorshow">
                                    <input type="text" name="event_info" value="{{ session('eventRequestData.event_info') }}" class="form-control" placeholder="Event Information">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                    <input type="text" class="form-control" name="start_date" value="{{ session('eventRequestData.start_date') }}" placeholder="Start Date" onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                    <input type="text" class="form-control" name="start_time" value="{{ session('eventRequestData.start_time') }}" placeholder="Start Time" onfocus="(this.type='time')" onblur="(this.type='text')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                <input type="text" class="form-control" name="end_date" value="{{ session('eventRequestData.end_date') }}" placeholder="End Date" onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                <input type="text" class="form-control" name="end_time" value="{{ session('eventRequestData.end_time') }}" placeholder="End Time" onfocus="(this.type='time')" onblur="(this.type='text')">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox-border">
                                    <h3 class="checkbox-title">Event Request Type</h3>
                                    <div class="form-group errorshow">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" onclick="setFree()" data-id="{{$eventReqType->fee}}" name="event_req_type" value="{{ $eventReqType->event_req_type  }}" checked>
                                            <label class="form-check-label" for="eventReqType1">{{ $eventReqType->event_req_type }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" onclick="setFree1()" data-id="{{$secondEventReqType->fee}}" name="event_req_type" value="{{ $secondEventReqType->event_req_type }}">
                                            <label class="form-check-label" for="eventReqType2">{{ $secondEventReqType->event_req_type }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 selectfree">
                                <div class="checkbox-border">
                                    <h3 class="checkbox-title">event cost</h3>
                                    <div class="form-group errorshow">
                                        <div class="form-check">
                                            <input type="radio" onclick="selectfree()" class="form-check-input" id="free" name="event_cost" value="free" checked>
                                            <label class="form-check-label" for="free">FREE</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" onclick="selectfee()" class="form-check-input" id="fee" name="event_cost" value="fee">
                                            <label class="form-check-label" for="fee">FEE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fee">
                                <div class="form-group errorshow">
                                    <input type="text" name="event_fee" class="form-control" placeholder="Fee" readonly value="{{ $eventReqType->event_fee }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                    <input type="text" name="first_name" value="{{ session('eventRequestData.first_name') }}" class="form-control" placeholder="Event Contact - First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                    <input type="text" name="last_name" value="{{ session('eventRequestData.last_name') }}" class="form-control" placeholder="Event Contact - Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6 align-self-center">
                                <div class="form-group errorshow">
                                    <input type="text" name="telephone" value="{{ session('eventRequestData.telephone') }}" class="form-control" placeholder="Telephone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group errorshow">
                                    <input type="text" name="event_location" value="{{ session('eventRequestData.event_location') }}" class="form-control" placeholder="Event Location">
                                </div>
                            </div>
                            <div class="col-md-6 radioinline">
                                <div class="checkbox-border mt-0 h-100">
                                    <h3 class="checkbox-title">Event Type</h3>
                                    <div class="form-group d-flex align-items-center errorshow h-100 gap-5">
                                    <div class="form-check mt-0">
                                        <input type="radio" name="event" {{ session('eventRequestData.event') == 'Virtual' ? 'checked' : '' }} class="form-check-input" id="yes" value="Virtual">
                                        <label class="form-check-label" for="virtual">Virtual</label>
                                    </div>
                                    <div class="form-check mb-0">
                                        <input type="radio" name="event" {{ session('eventRequestData.event') == 'Onsite' ? 'checked' : '' }} class="form-check-input" id="no" value="Onsite">
                                        <label class="form-check-label" for="onsite">Onsite</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 radiofull">
                                <div class="checkbox-border">
                                    <h3 class="checkbox-title">Event Type</h3>
                                    <div class="form-group errorshow">
                                    <div class="form-check">
                                        <input type="radio" name="event" class="form-check-input" id="yes" value="Virtual">
                                        <label class="form-check-label" for="virtual">Virtual</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="event" class="form-check-input" id="no" value="Onsite">
                                        <label class="form-check-label" for="onsite">Onsite</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form_box aos-init aos-animate fee" data-aos="zoom-in" data-aos-duration="1000">
                                <h2 class="section_title" style="margin-bottom: 15px">Payment Details</h2>
                                <div class="row gy-4" style="margin-bottom: 15px">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group errorshow">
                                        <input type="text" class="form-control" placeholder="Name on Card" name="full_name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group errorshow">
                                        <input type="number" class="form-control card-number" min="1" placeholder="Card Number" name="card_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-4">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group errorshow">
                                        <input type="number" class="form-control card-cvc" size='4' placeholder="CVC" name="cvv">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group errorshow">
                                            <select class="form-control card-expiry-month" name="expiry_month">
                                                <option disabled selected>MM</option>
                                                @foreach(range(1, 12) as $month)
                                                    <option value="{{$month}}">{{$month}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group errorshow">
                                            <select class="form-control card-expiry-year" name="expiry_year">
                                                <option disabled selected>YYYY</option>
                                                @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                    <option value="{{$year}}">{{$year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-row row mt-2'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Request Form End -->
@stop
@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
function setFree1(){
    var feeInput = document.querySelector('input[name="event_fee"]');
    feeInput.value = '{{$secondEventReqType->fee}}';
}

function setFree(){
    var feeInput = document.querySelector('input[name="event_fee"]');
    feeInput.value = '{{$eventReqType->fee}}';
}

function selectfee(){
    var checkedDataIdValue = getCheckedDataId();
    var feeInput = document.querySelector('input[name="event_fee"]');
    feeInput.value = checkedDataIdValue;
    $('.radioinline').hide();
    $('.fee').show();
    $('.radiofull').show();
}

function selectfree(){
    $('.radioinline').show();
    $('.fee').hide();
    $('.radiofull').hide();
}

function getCheckedDataId() {
    var radioButtons = document.getElementsByName('event_req_type');
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            var dataIdValue = radioButtons[i].getAttribute('data-id');
            return dataIdValue;
        }
    }
}
$(function() {
    $('#event_request').validate({
        rules: {
            title: {
                required: true,
            },
            full_name: {
                required: true,
            },
            card_number: {
                required: true,
                number: true,
                creditcard: true,
            },
            expiry_month: {
                required: true,
            },
            expiry_year: {
                required: true,
            },
            cvv: {
                required: true,
                number: true,
                maxlength: 4,
            },
            event_category: {
                required: true,
            },
            event_info: {
                required: true,
            },
            startDate: {
                required: true,
            },
            startTime: {
                required: true,
            },
            endDate: {
                required: true,
            },
            endTime: {
                required: true,
            },
            event_cost: {
                required: true,
            },
            fee: {
                required: true,
            },
            firstName: {
                required: true,
            },
            lastName: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            telephone: {
                required: true,
            },
            event: {
                required: true,
            },
            eventLocation: {
                required: true,
            }
        },
        messages: {
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.errorshow').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

   $("body").on("submit", "#event_request", function (e) {
        var $form = $(this);
        var $inputs = $form.find('.required');
        var $errorMessage = $form.find('div.error');
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');

        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
    });

    function stripeResponseHandler(status, response) {
        var $form = $('.require-validation');
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
@endpush
