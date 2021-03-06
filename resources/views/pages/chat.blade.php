@extends('layouts/master')
@section('content')
<div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-xl-12 p-0">
                <!-- Begin Widget -->
                <div class="row m-0 widget no-bg">
                    <!-- Begin Friends Sidebar -->
                    <div class="col-xl-2 col-lg-3 col-md-12 p-0" id="sidebar">
                        <!-- Begin Friendslist -->
                        <div class="sidebar-content w-100 h-100">
                            <div class="input-group no-padding" id="search-group">
                                <input type="text" class="form-control border-0" placeholder="Search friends ..." id="search-name">
                            </div>
                            <!-- Begin List Group -->
                            <div id="list-group">
                                <ul class="friend-list list-group w-100 friends-scroll auto-scroll">
                                    <li class="heading">Chats</li>
                                    <li class="list-group-item">
                                        <a class="d-block" data-toggle="tab" href="#msg-1">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-02.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Brandon Smith</h4>
                                                    <p>Are you serious ?</p>
                                                </div>
                                                <div class="media-right align-self-center">
                                                    <span class="date-send">14:21</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="d-block" data-toggle="tab" href="#msg-2">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-03.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Louis Henry</h4>
                                                    <p>Bonne idée ...</p>
                                                </div>
                                                <div class="media-right align-self-center">
                                                    <span class="date-send">10:35</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="d-block" data-toggle="tab" href="#msg-3">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-04.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Nathan Hunter</h4>
                                                    <p>Nope!</p>
                                                </div>
                                                <div class="media-right align-self-center">
                                                    <span class="date-send">14:10</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="d-block" data-toggle="tab" href="#msg-4">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-05.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Megan Duncan</h4>
                                                    <p>See you later!</p>
                                                </div>
                                                <div class="media-right align-self-center">
                                                    <span class="date-send">16:09</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a class="d-block" data-toggle="tab" href="#msg-5">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-06.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Beverly Oliver</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="heading">Contacts</li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-07.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Lisa Garett</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-08.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Peter Collins</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-09.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Michael Bradley</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-02.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Brandon Smith</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-03.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Nathan Hunter</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-04.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Megan Duncan</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-07.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Lisa Garett</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-08.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Peter Collins</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-group-item contacts">
                                        <a href="pages-profile.html">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <img src="assets/img/avatar/avatar-09.jpg" class="user-img rounded-circle" alt="...">
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <h4>Michael Bradley</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End List Group -->
                        </div>
                        <!-- End Friendslist -->
                    </div>
                    <!-- End Friends Sidebar -->
                    <!-- Begin Messages -->
                    <div class="col-xl-8 col-lg-9 col-md-12 d-flex no-padding">
                        <!-- Begin Card -->
                        <div class="card w-100 no-bg">
                            <!-- Begin Tab -->
                            <div class="tab-content">
                                <!-- Begin Tab 1 (Show) -->
                                <div class="tab-pane fade show active messages-scroll auto-scroll" style="flex: 1 1" id="msg-1">
                                    <div class="card-header">
                                        <div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-column align-items-center">
                                            <div class="col-xl-6 d-flex justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                                <div class="discussion-name">Brandon Smith</div>
                                            </div>
                                            <div class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-star-o la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-phone la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-play-circle la-2x"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column no-padding">
                                        <div class="container-fluid">
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Hi, Brandon</span>
                                                    </div>
                                                    <span class="sender-time"><small>14:00</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span>Hello, David</span>
                                                    </div>
                                                    <span class="receiver-time"><small>14:02</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-02.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span>What's up?</span>
                                                    </div>
                                                    <span class="receiver-time"><small>14:03</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-02.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>I need to talk to you to simulate content</span>
                                                    </div>
                                                    <span class="sender-time"><small>14:10</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Because we do not really exist, did you know?</span>
                                                    </div>
                                                    <span class="sender-time"><small>14:12</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span>What?</span>
                                                    </div>
                                                    <span class="receiver-time"><small>14:15</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-02.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span>It's a joke?</span>
                                                    </div>
                                                    <span class="receiver-time"><small>14:15</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-02.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span>How do explain this to my wife?</span>
                                                    </div>
                                                    <span class="receiver-time"><small>14:20</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-02.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Uh!? ...</span>
                                                    </div>
                                                    <span class="sender-time"><small>14:21</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Are you serious?</span>
                                                    </div>
                                                    <span class="sender-time"><small>14:21</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Tab 1 -->
                                <!-- Begin Tab 2 -->
                                <div class="tab-pane fade messages-scroll auto-scroll" style="flex: 1 1" id="msg-2">
                                    <div class="card-header">
                                        <div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-column align-items-center">
                                            <div class="col-xl-6 d-flex justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                                <div class="discussion-name">Louis Henry</div>
                                            </div>
                                            <div class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-star-o la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-phone la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-play-circle la-2x"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column no-padding">
                                        <div class="container-fluid">
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span class="mx-2">Bonjour, comment ça va?</span>
                                                    </div>
                                                    <span class="receiver-time"><small>10:30</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-03.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Pourquoi tu parle en français?</span>
                                                    </div>
                                                    <span class="sender-time"><small>10:32</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span class="mx-2">Pour faire un petit coucou aux utilisateurs français!</span>
                                                    </div>
                                                    <span class="receiver-time"><small>10:34</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-03.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Bonne idée, coucou à toi qui lis ces lignes :)</span>
                                                    </div>
                                                    <span class="sender-time"><small>10:35</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Tab 2 -->
                                <!-- Begin Tab 3 -->
                                <div class="tab-pane fade messages-scroll auto-scroll" style="flex: 1 1" id="msg-3">
                                    <div class="card-header">
                                        <div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-column align-items-center">
                                            <div class="col-xl-6 d-flex justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                                <div class="discussion-name">Nathan Hunter</div>
                                            </div>
                                            <div class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-star-o la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-phone la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-play-circle la-2x"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column no-padding">
                                        <div class="container-fluid">
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span class="mx-2">In a commodo ante, quis dignissim odio.</span>
                                                    </div>
                                                    <span class="receiver-time"><small>14:02</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-04.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span class="mx-2">Vestibulum eget facilisis risus. Integer ac sem quis risus scelerisque gravida vel nec tellus.</span>
                                                    </div>
                                                    <span class="receiver-time"><small>14:03</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-04.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Nope!</span>
                                                    </div>
                                                    <span class="sender-time"><small>14:10</small></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Tab 3 -->
                                <!-- Begin Tab 4 -->
                                <div class="tab-pane fade messages-scroll auto-scroll" style="flex: 1 1" id="msg-4">
                                    <div class="card-header">
                                        <div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-column align-items-center">
                                            <div class="col-xl-6 d-flex justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                                <div class="discussion-name">Megan Duncan</div>
                                            </div>
                                            <div class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-star-o la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-phone la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-play-circle la-2x"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column no-padding">
                                        <div class="container-fluid">
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>You coming to the meeting tomorrow?</span>
                                                    </div>
                                                    <span class="sender-time"><small>16:00</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span class="mx-2">Yes, we must see together the next updates of elisyam!</span>
                                                    </div>
                                                    <span class="receiver-time"><small>16:01</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-05.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span class="mx-2">Have you ever done something?</span>
                                                    </div>
                                                    <span class="receiver-time"><small>16:03</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-05.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Yes, I already planned the addition of several features!</span>
                                                    </div>
                                                    <span class="sender-time"><small>16:05</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>But if you have an idea, do not hesitate to tell me!</span>
                                                    </div>
                                                    <span class="sender-time"><small>16:06</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span class="mx-2">We will speak tomorrow!</span>
                                                    </div>
                                                    <span class="receiver-time"><small>16:07</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-05.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                            <div class="row m-0">
                                                <div class="message-card">
                                                    <div class="card-body sender-background">
                                                        <span>Okay, good evening</span>
                                                    </div>
                                                    <span class="sender-time"><small>16:08</small></span>
                                                </div>
                                            </div>
                                            <div class="row m-0 justify-content-end">
                                                <div class="message-card">
                                                    <div class="card-body receiver-background">
                                                        <span class="mx-2">See you tomorrow</span>
                                                    </div>
                                                    <span class="receiver-time"><small>16:09</small></span>
                                                </div>
                                                <img src="assets/img/avatar/avatar-05.jpg" class="avatar-bubble rounded-circle" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Tab 4 -->
                                <!-- Begin Tab 5 -->
                                <div class="tab-pane fade messages-scroll auto-scroll" style="flex: 1 1" id="msg-5">
                                    <div class="card-header">
                                        <div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-column align-items-center">
                                            <div class="col-xl-6 d-flex justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                                <div class="discussion-name">Beverly Oliver</div>
                                            </div>
                                            <div class="col-xl-6 d-flex justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-star-o la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item mr-3">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-phone la-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0)"> 
                                                            <i class="la la-play-circle la-2x"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column no-padding">
                                        <div class="container-fluid">
                                        <div class="container-fluid">
                                            <div class="no-messages">
                                                <i class="la la-comments"></i>
                                                <div class="text">No Messages</div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Tab 5 -->
                            </div>
                            <!-- End Tab -->
                            <!-- Begin Input Group -->
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button class="btn" type="button">
                                        <i class="la la-paperclip la-2x text-primary"></i>
                                    </button>
                                </span>
                                <input type="text" class="form-control no-ppading-right no-padding-left" placeholder="Type your message ...">
                                <span class="input-group-btn">
                                    <button class="btn" type="button">
                                        <i class="la la-paper-plane la-2x text-primary"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- End Input Group -->
                        </div>
                        <!-- End Card -->
                    </div>
                    <!-- End Messages -->
                    <!-- Begin Infos -->
                    <div class="col-xl-2 p-0 chat-infos bg-white has-shadow">
                        <div class="message-avatar">
                            <div class="overlay"></div>
                            <img src="assets/img/avatar/avatar-02-big.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="message-infos text-center">
                            <div class="user-title">Brandon Smith</div>
                            <span class="last-seen">Last seen about 2 hours ago</span>
                        </div>
                        <ul class="social-network text-center mt-3">
                            <li><a href="#" class="ico-facebook" title="Facebook">
                                <i class="ion-social-facebook"></i></a>
                            </li>
                            <li><a href="#" class="ico-twitter" title="Twitter">
                                <i class="ion-social-twitter"></i></a>
                            </li>
                            <li><a href="#" class="ico-linkedin" title="Linkedin">
                                <i class="ion-social-linkedin"></i></a>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <ul class="list-unstyled mt-5">
                                <li class="pb-3 text-center">
                                    <i class="la la-map-marker la-2x d-block text-primary mb-2"></i>Los Angeles
                                </li>
                                <li class="pb-3 text-center">
                                    <i class="la la-firefox la-2x d-block text-primary mb-2"></i>Mozilla Firefox
                                </li>
                                <li class="pb-3 text-center">
                                    <i class="la la-desktop la-2x d-block text-primary mb-2"></i>Windows 10
                                </li>
                                <li class="pb-3 text-center">
                                    <i class="la la-at la-2x d-block text-primary mb-2"></i>bsmith@example.com
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Infos -->
                </div>
                <!-- End Widget -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
@endsection