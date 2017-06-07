<script src="{{ asset('js/JqueryValidation/jquery-1.11.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/jquery.form.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/JqueryValidation/additional-methods.min.js') }}"></script>
<script src="{{ asset('js/JqueryValidation/custom-validation.js') }}" type="text/javascript"></script> 
<form id="forgotPassword" action="{{ route('forgotPassword') }}" meyhod="POST">
    <label>Email</label> 
    <input  type="text" name="email_contact">          
    <button type="submit">Submit</button>      
</form>  