import React from 'react';
import ReactDOM from 'react-dom';
import 'D:/Desktop/SITCOM/resources/css/app.css';


const App = props => (
  <LoginForm />
);


class LoginForm extends React.Component{
render(){
  return(
    <div id="loginform">
      <FormHeader title="SITCOM" />
      <Form />
 
    </div>
  )
}
}

const FormHeader = props => (
  <h2 id="headerTitle">{props.title}</h2>
);


const Form = props => (
 <div>
   <FormInput description="Username" placeholder="Enter your username" type="text" />
   <FormInput description="Password" placeholder="Enter your password" type="password"/>
   <FormInput description="Role" placeholder="Enter your role" type="text"/>
   <FormButton title="Log in"/>
 </div>
);

const FormButton = props => (
<div id="button" class="row">
  <button>{props.title}</button>
</div>
);

const FormInput = props => (
<div class="row">
  <label>{props.description}</label>
  <input type={props.type} placeholder={props.placeholder}/>
</div>  
);

ReactDOM.render(<App />, document.getElementById('login'));
export default login;

// DOM element
if (document.getElementById('login')) {
    ReactDOM.render(<App />, document.getElementById('login'));
}
