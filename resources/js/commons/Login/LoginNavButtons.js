import Box from '@mui/material/Box';
import Buttons from '../globals/Button';

const NavButtons = (props) => {
    return (
        <Box p={1}>
            <Buttons 
                sx={{...props.classes.btnOr}} 
                variant="contained" 
                size="medium" 
                fullWidth 
                href={`/${props.action}/${props.names}`} 
                text={props.names}/>
        </Box>
    );
}

const LoginNavButton = ({classes,action}) => {

    const buttonNames = ['admin','coordinator','supervisor','student'];
    const isRegister = action === 'register';

    return (
        <>
            {   isRegister ? 
                buttonNames.slice(1).map((names) => { return <NavButtons key={names} names={names} classes={classes} action={action}/> }) : 
                buttonNames.map((names) => { return <NavButtons key={names} names={names} classes={classes} action={action}/> })
            }
        </>
    );
}
 
export default LoginNavButton;