<div class="container">
    @if (isset($success))
        <div>
            {{$success}}
        </div>
    @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Анкета') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('saveform')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Имя') }}</label>
                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">*</span>
                                        <input id="name" wire:model.live="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="second_name" class="col-md-4 col-form-label text-md-end">{{ __('Фамилия') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">*</span>
                                        <input id="second_name" wire:model.live="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror" name="second_name" value="{{ old('second_name') }}">

                                        @error('second_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Отчество') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" wire:model.live="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date_brith" class="col-md-4 col-form-label text-md-end">{{ __('Дата рождения') }}</label>

                                <div class="col-md-6">
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">*</span>
                                        <input id="date_brith" wire:model.live="date_brith" type="date" class="form-control @error('date_brith') is-invalid @enderror" name="date_brith" value="{{ old('date_brith') }}">

                                        @error('date_brith')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    @if (empty($phones[0]))
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">*</span>
                                    @endif
                                            <input id="email" wire:model.live="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                    @if (empty($phones[0]))
                                        </div>
                                    @endif
                                    @error('email')
                                        <span class="invalid-feedback" @style('display:block') role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            @foreach ($phones as $index => $phone)
                                
                                <div class="row mb-3" wire:key="phone-field-{{$index}}">
                                    <label for="phone_code{{$index}}"  class="col-md-4 col-form-label text-md-end">{{ __('Код страны') }}</label>

                                    <div class="col-md-6">
                                        <select id="phone_code{{$index}}"  wire:model.live="phone_code.{{$index}}" class="form-select @error('phone_code.'. $index) is-invalid @enderror" name="phone_code{{$index}}">
                                            <option value="+7">+7</option>
                                            <option selected value="+375">+375</option>
                                        </select>
                                    </div>

                                    <label for="phone{{$index}}"  class="col-md-4 col-form-label text-md-end">{{ __('Номер телефона') }}</label>
                                        <div class="col-md-6">
                                            @if (empty($email))
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">*</span>
                                            @endif
                                                    <input id="phones{{$index}}" wire:model.live="phones.{{$index}}" type="text" class="form-control @error('phones.'. $index) is-invalid @enderror" value="{{ old('phones'.$index) }}" name="phones{{$index}}">
                                            @if (empty($email))
                                                </div>
                                            @endif
                                            @error('phones.'. $index)
                                                <span class="invalid-feedback" @style('display:block') role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
                            @endforeach
                            @if ($index <= 3)
                                <div class="row mb-3 " >
                                    <div class="col-md-6 offset-md-4">
                                        <button class="btn btn-info form-control" type="button" wire:click="addPhone"> {{__('Добавить Номер')}}</button>
                                    </div>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="family"  class="col-md-4 col-form-label text-md-end">{{ __('Семейное положение') }}</label>
                                <div class="col-md-6">
                                    <select id="family" wire:model.live="family" class="form-select @error('family') is-invalid @enderror" name="family">
                                        <option value="Холост/не замужем">Холост/не замужем</option>
                                        <option value="Женат/замужем">Женат/замужем</option>
                                        <option value="В разводе">В разводе</option>
                                        <option value="Вдовец/вдова">Вдовец/вдова</option>
                                    </select>
                                    @error('family')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="about_me"  class="col-md-4 col-form-label text-md-end">{{ __('О себе') }}</label>
                                <div class="col-md-6">
                                    <textarea id="about_me" rows="3" wire:model.live="about_me" value="{{ old('about_me') }}" class="form-control @error('about_me') is-invalid @enderror" rows="3" name="about_me"></textarea>
                                    @error('about_me')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image"  class="col-md-4 col-form-label text-md-end">{{ __('Файлы') }}</label>
                                <div class="col-md-6">
                                    <input id="image" wire:model="image" multiple type="file"  class="form-control @error('image') is-invalid @enderror" name="image[]">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">*</span>
                                        <div class="form-check">
                                            <input class="form-check-input" wire:model.live="checkrul" type="checkbox" name="checkrul" id="checkrul" {{ old('checkrul') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="checkrul">
                                                {{ __('Я ознакомился c правилами') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"  
                                    {{!is_null($name) && !is_null($second_name) && 
                                    (!is_null($email) || (!is_null($phone) && !is_null($phone_code))) && 
                                    !is_null($date_brith) && !is_null($checkrul) &&
                                    count($errors) == 0? '' : 'disabled'}} class="btn btn-primary">
                                        {{ __('Отправить') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        @error('regError')
                        <div class="p-0 alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    @error('regError')
                    <div class="p-0 alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    @endif
    

    
</div>

<script>

    function checkSize(el) {
        const { width, height } = el.style;
        const regExp = /\*|px|\$/g;
        var heightRep = height.replace(regExp, '');
        if (heightRep >= 190) {
            el.style.resize = 'none';
        }
    }

    const textarea = document.querySelector('textarea');

    new MutationObserver(function([ { target } ]) {
        checkSize(target);
        }).observe(textarea, {
        attributes: true,
        attributeFilter: [ 'style' ]
    });

    checkSize(textarea);

</script>
