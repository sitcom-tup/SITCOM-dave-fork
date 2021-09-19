import React, { PureComponent } from 'react'
import ReactDOM from 'react-dom'
import Button from '@material-ui/core/Button'

const Container = () => {
    return (
        <Button variant="outlined" color="default" href="/login">
          Click me
        </Button>
    );
}
 
export default Container;

if(document.getElementById('home')) {
    ReactDOM.render(<Container/>, document.getElementById('home'));
}