import { makeStyles } from '@material-ui/core/styles';

const useStyles = makeStyles((theme) => ({
    root: {
        margin: '0px',
        padding: '0px',
        height: '100%',
        color: 'white',
        // filter:'blur(5px)'
    },

    backImg: {
      backgroundRepeat: 'no-repeat',
      backgroundPosition: 'center center',
      backgroundSize: 'cover',
      // filter: 'blur(5px)',
      filter: 'brightness(130%)',
      width: '100%',
      // height: '100%',
    },

    grid: {
      position:'absolute',
      top: '0%',
      padding:'15px',
    },

    logo:{
      // width:'20%',
      padding:'20px',
      height: 100,
    },

    paper: {
      margin: theme.spacing(8, 4),
      display: 'flex',
      flexDirection: 'column',
      alignItems: 'center',
    },
   
    form: {
      width: '100%', // Fix IE 11 issue.
      marginTop: theme.spacing(3),
   
    },
    
    submit: {
      margin: theme.spacing(3, 0, 2),
    },
    
    input: {
      color: "white"
    },
    
    multilineColor:{
      color:'white'
    },

    floatingLabelFocusStyle: {
        color: "white"
    },

    palette: {
        primary: {
            light: '#757ce8',
            main: '#3f50b5',
            dark: '#002884',
            contrastText: '#fff',
        },

        secondary: {
            light: '#ff7961',
            main: '#f44336',
            dark: '#ba000d',
            contrastText: '#000',
        },
    },
  
}));

  export {useStyles};