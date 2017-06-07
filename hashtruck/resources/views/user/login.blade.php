<script src="{{ asset('js/JqueryValidation/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/jquery.form.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/JqueryValidation/custom-validation.js') }}" type="text/javascript"></script> 
<form id="loginForm" action="{{ route('loginData') }}" meyhod="POST">
    <label>Email/Contact number</label> 
    <input  type="text" name="email_contact">          
    <label>Password</label> 
    <input  type="text" name="password"> 
    <button type="submit">Login</button>      
</form>  