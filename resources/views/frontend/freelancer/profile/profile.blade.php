@extends('layouts.master')

@section('content')
    @include('modal.freelancerProfile.profileUpdate')
    @include('modal.freelancerProfile.aboutMe')
    @include('modal.freelancerProfile.education')
    @include('modal.freelancerProfile.education_update')
    @include('modal.freelancerProfile.experience_update')
    @include('modal.freelancerProfile.skills_update')
    @include('modal.freelancerProfile.experience')
    @include('modal.freelancerProfile.skills')
    <!-- Intro -->
    <section id="top" class="one dark cover paddingNone">
        <div class="parent">
            <div class="box-one">
                <h1>
                    <span class="color-secondary">{{$data['user_detail']->userDetail->title}}</span>

                </h1>
                <div style="margin-top:50px;">
                    <a class="contact-link" target="_blank" href="https://www.instagram.com/akhtar_sheraliat/"> Contact
                        Me</a></div>
            </div>
            <div class="box-two">
                <div class="profile_image">
                    <img class="profile_img" src="{{asset('/').$data['user_detail']->avatar}}">
                </div>
                <span class="card-title modal-title">{{$data['user_detail']->userDetail->first_name}} {{$data['user_detail']->userDetail->last_name}}</span>
                <a class="" href="#update-profile" uk-toggle>
                    <button class="uk-button-primary uk-button-small">update Profile</button>
                </a>
            </div>
        </div>
    </section>
    <!-- About Me -->
    <section  class="one">
        <div class="uk-card uk-card-default uk-card-body uk-width-1">
            <div class="uk-card-badge uk-labefl">
                <a class="" href="#about-me" uk-toggle>
                    <button class="uk-button-primary uk-button-small">update</button>
                </a>
            </div>
            <h3 class="uk-card-title">About ME</h3>
            <p>{!! $data['user_detail']->userDetail->about_me !!}</p>
        </div>
        <br>
        <div class="uk-card uk-card-default uk-card-body uk-width-1">
            <div class="uk-card-badge uk-labefl">
                <a class="" href="#education_add" uk-toggle>
                    <button class="uk-button-primary uk-button-small add_education_button">Add</button>
                </a>
            </div>
            <h3 class="uk-card-title">Education</h3>

            <div class="uk-grid-match uk-child-width-expand@s uk-text-center" uk-grid>
                <div>
                    <div class="uk-child-width-1-3@s" uk-grid>
                        @if($data['user_detail']->userDetail->userEducation != null)
                            @foreach($data['user_detail']->userDetail->userEducation as $education)
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <h3 class="uk-card-title">{{$education->degree_title}}</h3>
                                        <p>{{$education->start_date}} - {{$education->end_date}} </p>
                                        <p>{{$education->description}}</p>
                                        <div>
                                            <a class="" href="#education_update" uk-toggle ><button onclick="edit_data(this.id)" edit_record_id="{{$education->id}}" id="Edit_Data_{{$education->id}}" degree_title="{{$education->degree_title}}" start_date="{{$education->start_date}}" end_date="{{$education->end_date}}" description="{{$education->description}}" class="myEdiButton uk-button-success uk-button-small">Edit</button></a>
                                            <a href="{{route('freelancer.delete.education' , $education->id)}}"><button class="uk-button-danger uk-button-small">Delete</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="uk-card uk-card-default uk-card-body uk-width-1">
            <div class="uk-card-badge uk-labefl">
                <a class="" href="#experience" uk-toggle>
                    <button class="uk-button-primary uk-button-small">Add</button>
                </a>
            </div>

            <h3 class="uk-card-title">Experience</h3>
            <div class="uk-grid-match uk-child-width-expand@s uk-text-center" uk-grid>
                <div>
                    <div class="uk-child-width-1-3@s" uk-grid>
                        @if($data['user_detail']->userDetail->userExperience != null)
                            @foreach($data['user_detail']->userDetail->userExperience as $experience)
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <h3 class="uk-card-title">{{$experience->title}}</h3>
                                        <p>{{$experience->start_date}} - {{$experience->end_date}} </p>
                                        <p>{{$experience->description}}</p>
                                        <div>
                                            <a class="" href="#experience_update" uk-toggle ><button onclick="edit_data(this.id)" edit_record_id="{{$experience->id}}" id="Edit_Data_{{$experience->id}}" title="{{$experience->title}}" start_date="{{$experience->start_date}}" end_date="{{$experience->end_date}}" description="{{$experience->description}}" class="myEdiButton uk-button-success uk-button-small">Edit</button></a>
                                            <a href="{{route('freelancer.delete.experience' , $experience->id)}}"><button class="uk-button-danger uk-button-small">Delete</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="uk-card uk-card-default uk-card-body uk-width-1">
            <div class="uk-card uk-card-default uk-card-body uk-width-1">
                <div class="uk-card-badge uk-labefl">

                    <a class="" href="#skills" uk-toggle>
                        <button class="uk-button-primary uk-button-small">Add</button>
                    </a>
                </div>
            <h3 class="uk-card-title">Skills</h3>
            <p>
                @if($data['user_detail']->userDetail->skills != null)
                    @foreach($data['user_detail']->userDetail->skills as $skill)
                        <div class="uk-inline">
                            <button class="uk-button uk-button-primary" type="button">{{$skill->name}}</button>
                            <div uk-drop="mode: click">
                                <div class="uk-card uk-card-body uk-card-default">
                                    <div>
                                        <a class="uk-drop-close" href="#skills_update" uk-toggle ><button onclick="edit_data(this.id)" edit_record_id="{{$skill->id}}" id="Edit_Data_{{$skill->id}}" name="{{$skill->name}}"  class="myEdiButton uk-button-success uk-button-small">Edit</button></a>
                                        <a href="{{route('freelancer.delete.skill' , $skill->id)}}"><button class="uk-button-danger uk-button-small">Delete</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </p>
        </div>

    </section>

    <hr>
    <section  class="one">

        <h3 class="uk-card-title">Job Reviews</h3>


        <div class="uk-card uk-card-default uk-width-1">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="40" height="40" src="images/avatar.jpg">
                    </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">JOB Title</h3>

                        <div>
                            <div class="uk-child-width-1" uk-grid>
                                @if($data['order_detail'] != null)
                                    @foreach($data['order_detail'] as $order_detail)
                                        <div>
                                            <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                                <h3 class="uk-card-title">{{$order_detail->jobDetail->title}}</h3>
                                                @if($order_detail->status == $orderCompletedId)
                                                    @if($order_detail->client_rating != null)
                                                        <p>{{$order_detail->client_review}}</p>
                                                        <p>{{$order_detail->client_rating}}</p>
                                                    @endif
                                                    @if($order_detail->freelancer_rating != null)
                                                        <p>{{$order_detail->freelancer_review}}</p>
                                                        <p>{{$order_detail->freelancer_rating}}</p>
                                                    @endif

                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>

        <br>




    </section>





@endsection

{{--
@extends('layouts.master')

@section('content')
@include('modal.freelancerProfile.profileUpdate')
@include('modal.freelancerProfile.aboutMe')
@include('modal.freelancerProfile.education')
@include('modal.freelancerProfile.experience')
@include('modal.freelancerProfile.skills')
    <!-- Intro -->
    <section id="top" class="one dark cover paddingNone">
        <div class="parent">
            <div class="box-one">
                <h1>
                    Hi,<br/>
                    I’m
                    <span class="color-secondary">Akhtar Abbas</span>
                    <br/>
                    I,m a <span class="color-secondary">Web Developer</span>, at
                    <a class="color-secondary" target="_blank" href="http://jsdevs.dev">JSdevs</a>
                </h1>
                <div style="margin-top:50px;">
                    <a class="contact-link" target="_blank" href="https://www.instagram.com/akhtar_sheraliat/"> Contact
                        Me</a></div>
            </div>
            <div class="box-two">
                <div class="profile_image">
                    <img class="profile_img" src="https://s.cdpn.io/profiles/user/1206184/512.jpg?1568477798">
                </div>
                <a class="" href="#update-profile" uk-toggle>
                    <button class="uk-button-primary uk-button-small">update Profile</button>
                </a>
            </div>
        </div>
    </section>
    <!-- About Me -->
    <section  class="one">
        <div class="uk-card uk-card-default uk-card-body uk-width-1">
            <div class="uk-card-badge uk-labefl">
                <a class="" href="#about-me" uk-toggle>
                    <button class="uk-button-primary uk-button-small">update</button>
                </a>
            </div>
            <h3 class="uk-card-title">About ME</h3>
            <p>Lorem ipsum color sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
<br>
        <div class="uk-card uk-card-default uk-card-body uk-width-1">
            <div class="uk-card-badge uk-labefl">
                <a class="" href="#education" uk-toggle>
                    <button class="uk-button-primary uk-button-small">Add</button>
                </a>
            </div>
            <h3 class="uk-card-title">Education</h3>

            <div class="uk-grid-match uk-child-width-expand@s uk-text-center" uk-grid>
                <div>
            <div class="uk-child-width-1-3@s" uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                        <h3 class="uk-card-title">Small</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
                </div>


            </div>
        </div>
        <br>

        <div class="uk-card uk-card-default uk-card-body uk-width-1">
            <div class="uk-card-badge uk-labefl">
                <div class="uk-card-badge uk-labefl">
                    <a class="" href="#experience" uk-toggle>
                        <button class="uk-button-primary uk-button-small">Add</button>
                    </a>
                </div>
            </div>
            <h3 class="uk-card-title">Experience</h3>
            <p>Lorem ipsum color sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <br>
        <div class="uk-card uk-card-default uk-card-body uk-width-1">
            <div class="uk-card-badge uk-labefl">
                <div class="uk-card-badge uk-labefl">
                    <a class="" href="#skills" uk-toggle>
                        <button class="uk-button-primary uk-button-small">Add</button>
                    </a>
                </div>
            </div>
            <h3 class="uk-card-title">Skills</h3>
            <p>Lorem ipsum color sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

    </section>

<hr>
    <section  class="one">

        <h3 class="uk-card-title">Job Reviews</h3>


        <div class="uk-card uk-card-default uk-width-1">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle" width="40" height="40" src="images/avatar.jpg">
                    </div>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">JOB Title</h3>
                        <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
            </div>

        </div>

        <br>




    </section>





@endsection--}}
