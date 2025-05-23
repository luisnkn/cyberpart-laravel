@php Theme::set('pageName', __('Đăng ký')) @endphp

<!-- START LOGIN SECTION -->
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>{{ __('Đăng ký') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('customer.register.post') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="name" id="txt-name" type="text" value="{{ old('name') }}" placeholder="{{ __('Họ tên') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="txt-email" type="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password" id="txt-password" placeholder="{{ __('Mật khẩu') }}">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" name="password_confirmation" id="txt-password-confirmation" placeholder="{{ __('Xác nhận mật khẩu') }}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input type="hidden" name="agree_terms_and_policy" value="0">
                                        <input class="form-check-input" type="checkbox" name="agree_terms_and_policy" id="terms-policy" value="1">
                                        <label class="form-check-label" for="terms-policy"><span>{{ __('Tôi đồng ý với điều khoản sử dụng.') }}</span></label>
                                    </div>
                                    @if ($errors->has('agree_terms_and_policy'))
                                        <span class="text-danger">{{ $errors->first('agree_terms_and_policy') }}</span>
                                    @endif
                                </div>
                            </div>
                            @if (setting('enable_captcha') && is_plugin_active('captcha'))
                                {!! Captcha::display() !!}
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block">{{ __('Đăng ký') }}</button>
                            </div>
                        </form>

                        <div class="text-center">
                            {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Ecommerce\Models\Customer::class) !!}
                        </div>

                        <div class="form-note text-center">{{ __('Bạn đã có tài khoảng?') }} <a href="{{ route('customer.login') }}">{{ __('Đăng nhập') }}</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN SECTION -->
