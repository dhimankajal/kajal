<form id="registerForm" action="{{ route('registerData') }}" meyhod="POST">
    <label>Name</label> 
    <input  type="text" name="name">          
    <label>Company name</label>
    <input  type="text" name="company_name">        
    <label>Email address</label>
    <input id="email" type="email" name="email">
    <label>Phone number</label>
    <input  type="text" name="phone">
    <label>Password</label>
    <input id="password" type="password" name="password">
    <label>Confirm password</label>
    <input id="confirm_password" type="password" name="confirm_password">
    <label>
    <input type="checkbox" name="terms" />
    I agree to <a href="{{ url('/Terms-And-Conditions')}}">Terms and Conditions</a>
    </label>  
    <button type="submit"> Sign Up</button>         
</form>  