@component('mail::message')
# {{$approvalDish->dish->dish_name}} has been Accepted

<p>Name : {{$approvalDish->dish->dish_name}}</p>
<p>Description : {{$approvalDish->dish->description}}</p>
<br>
<br>

#Message
<p>{{$approvalDish->approval_message}}</p>

@component('mail::button', ['url' => route('home.home-chef.dish.dish', $approvalDish->dish->id_dish)])
Check your dish
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
