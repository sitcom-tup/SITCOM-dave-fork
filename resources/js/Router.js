import React from "react";
import { BrowserRouter, Link, Route, Switch } from "react-router-dom";
import Home from "../js/components/Dashboard/Coordinator";



const Main = () => (
    <Switch>
        {/*User might LogIn*/}
        <Route exact path="/dashboard" component={Home} />
       

    
    </Switch>
);
export default Main;