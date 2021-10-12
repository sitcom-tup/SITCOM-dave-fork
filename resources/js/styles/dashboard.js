import { makeStyles } from '@material-ui/core/styles';

const useStyles = makeStyles((theme) => ({

    typography: {
      "fontFamily": 'Poppins',
      fontWeight: 600 ,
     },
     
    sidebar: {
        background: 'linear-gradient(180deg, #7A7676 20%, #992929 90%)',
        height: '100%',
        color:'white',
    },
    navbar:{
      background: '#7A7676 90%',
    },
    listitems:{
      "fontFamily": 'Poppins',
      opacity: '100%',
      backgroundColor: 'rgba(0,0,0,0)'
    },
    logo:{
      // width:'20%',
      marginRight:'35px',
      marginTop:'20px',
      height: 130,

    },
    chart:{
      height: '350px',
      
    },


  
}));

  export {useStyles};