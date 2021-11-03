import ERR404 from "./404";
import ERR500 from "./500";

const Error = ({error}) => {
    switch (error.status) {
        case 404: return <ERR404 status={error.status} message={error.statusText} />
        case 500: return <ERR500 status={error.status} message={error.statusText} />
        default: return <h1>No match</h1>
    }
        
}
 
export default Error;