import makeStyles from '@mui/material/styles/makeStyles';

const useStyles = makeStyles((theme) => ({
    root: {
        margin: '0px',
        padding: '0px',
        height: '100%',
        // color: 'white',
    },

    btnOr: {
      '&:hover' : {
        backgroundColor: '#923d3d',
        color: 'white'
      }
    },

    typography: {
      "fontFamily": 'Poppins',
      fontWeight: 600,
    },
    
    backImg: {
      backgroundRepeat: 'no-repeat',
      backgroundPosition: 'center center',
      backgroundSize: 'cover',
      // filter: 'blur(5px)',
      filter: 'brightness(130%)',
      width: '100%',
    },

    grid: {
      position:'absolute',
      top: '0%',
      padding:'15px',
    },

    signup: {
      [theme.breakpoints.down('md')] : {
        position:'absolute',
        width:'100%'
      }
    },

    signupButton: {
      backgroundColor: '#923d3d',
      color:'white',
      '&:hover' : {
        color:'black'
      }
    },

    leftImage: {
      borderRadius: 16,
      backgroundImage:'url(/pictures/tuptbg4.jpg)',
      backgroundSize: 'cover',
      backgroundPosition: 'center center',
      filter:'brightness(120%)',
      width:'100%',
      height:'700px',
      [theme.breakpoints.down('md')] : {
        backgroundImage: 'none',
      }
    },

    paperLeftImage: {
      borderRadius: 16,
      backgroundColor:'rgba(0,0,0,0.10)',
      height:'700px'
    },

    signupRightContent: {
      // paddingTop:'5%',
      paddingLeft:'10%',
      paddingRight:'10%',
      paddingBottom:'10%',
      backgroundColor:'transparent',
      color:'black',
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
      color: "black"
    },
    
    multilineColor:{
      borderRadius: '10px',
      backgroundColor: 'white',
      color:'black'
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