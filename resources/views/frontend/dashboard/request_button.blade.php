                                                <div class="req-btn-profile">
                                                    <ul class="media-list">
                                                        <li data-tooltip="Send Message"><a href="{{url('message').'/'.$userData->user_ref}}"><i><img src="{{asset('assets/images/icon/send-message.png')}}" alt="send-message" /></i></a></li>

                                                        <!-- like Button -->
                                                        @if($userData->like === 'like')
                                                        <li data-tooltip="Like" class="user-dislike userlike" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/Like.png')}}" style="filter: hue-rotate(120deg);" alt="Like" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Like" class="userlike user-like" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/Like.png')}}" alt="Like" /></i></a></li>
                                                        @endif

                                                        <!-- Bookmark Button -->
                                                        @if($userData->bookmark === 'bookmark')
                                                        <li data-tooltip="Bookmark" class="cancle-Bookmark userBook" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/bookmark.png')}}" style="filter: hue-rotate(120deg);" alt="Bookmark" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Bookmark" class="Bookmark userBook" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/bookmark.png')}}" alt="Bookmark" /></i></a></li>
                                                        @endif

                                                        <!-- Request Mobile Button -->
                                                        @if($userData->request_mobile === 'request-mobile')
                                                        <li data-tooltip="Request Mob no." class="cancle-request-mobile RequestMobile" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Mobile.png')}}" style="filter: hue-rotate(120deg);" alt="Request Mobile" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Request Mob no." class="request-mobile RequestMobile" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Mobile.png')}}" alt="Request Mobile" /></i></a></li>
                                                        @endif

                                                        <!-- Request email Button -->
                                                        @if($userData->request_email === 'request-email')
                                                        <li data-tooltip="Request Email" class="cancle-request-email RequestEmail" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Email.png')}}" style="filter: hue-rotate(120deg);" alt="Request Email" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Request Email" class="request-email RequestEmail" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Email.png')}}" alt="Request Email" /></i></a></li>
                                                        @endif

                                                        <!-- block Button -->
                                                        @if($userData->block === 'block')
                                                        <li data-tooltip="Block" class="unblock requestBlock" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/userBlock.png')}}" style="filter: hue-rotate(120deg);" alt="Block" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Block" class="block requestBlock" data-reference="{{$userData->user_ref}}" id="{{$userData->id}}"><a><i><img src="{{asset('assets/images/icon/userBlock.png')}}" alt="Block" /></i></a></li>
                                                        @endif
                                                    </ul>
                                                    <?php
													$group_name='';
													?>
                                                    @if($group_name === 'Requests Received')
                                                        <div class="buttons  mt-4">
                                                            <button type="submit" class="main-btn approve_user" data_to="">Approve</button>
                                                            <a class="custom-button deny_user" data_to="" href="javascript:void(0)">Deny</a>
                                                        </div>
                                                    @endif
                                                </div>
