<script src="{{ asset('js/JqueryValidation/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/jquery.form.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/JqueryValidation/custom-validation.js') }}" type="text/javascript"></script> 
<form id="registerForm" action="{{ route('registerData') }}" meyhod="POST">
    <label>Name</label> 
    <input  type="text" name="name">          
    <label>Company name</label>
    <input  type="text" name="company_name">        
    <label>Email address</label>
    <input id="email" type="email" name="email">
    <label>Phone number</label>
    <input  type="text" name="contact_no">
    <label>Password</label>
    <input id="password" type="password" name="password">
    <label>Confirm password</label>
    <input id="confirm_password" type="password" name="confirm_password">
    <label>
    <input type="checkbox" name="terms" />
    I agree to <a href="">Terms and Conditions</a>
    </label>  
    <button type="submit">Sign Up</button>         
</form>  