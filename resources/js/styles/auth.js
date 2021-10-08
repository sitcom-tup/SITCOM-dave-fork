const styles = {

  root: {
    margin: 0,
    padding: 0,
    height: '100%',
  },

  btnOr: {
    '&:hover' : {
      backgroundColor: '#923d3d',
      color: 'white'
    }
  },

  typography: {
    fontFamily: 'Poppins',
    fontWeight: 600,
  },

  backImg: {
    backgroundRepeat: 'no-repeat',
    backgroundPosition: 'center center',
    backgroundSize: 'cover',
    filter: 'brightness(130%)',
    width: '100%',
  },

  grid: {
    position:'absolute',
    top: '0%',
    padding:'15px',
  },

  signup: {
    position: { xs: 'absolute'},
    width: {xs:'100%'}
  },

  signupButton: {
    backgroundColor: '#923d3d',
    color:'white',
    "fontFamily": 'Poppins',
  },

  leftImage: {
    borderRadius: 16,
    backgroundImage: { md : 'url(/pictures/tuptbg2.jpg)', xs: 'none' },
    backgroundSize: 'cover',
    backgroundPosition: 'center center',
    filter:'brightness(120%)',
    width:'100%',
    height:'700px',
  },

  paperLeftImage: {
    borderRadius: 16,
    backgroundColor:'rgba(0,0,0,0.10)',
    height:'700px'
  },

  signupRightContent: {
    paddingLeft:'10%',
    paddingRight:'10%',
    paddingBottom:'10%',
    backgroundColor:'transparent',
    color:'black',
  },

  logo:{
    display:'block',
    marginLeft:'auto',
    marginRight:'auto',
    padding: '20px',
    height: 100,
  },

  paper: {
    mt:8,
    ml: 4,
    mr:4,
    display: 'flex',
    flexDirection: 'column',
    alignItems: 'center',
  },

  form: {
    width: '100%', // Fix IE 11 issue.
    mt: 3,

  },

  submit: {
    mt: 0.3
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

};

export { styles};