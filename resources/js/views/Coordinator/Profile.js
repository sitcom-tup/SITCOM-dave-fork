import * as React from 'react';
import ReactDOM from 'react-dom'
import {createTheme, ThemeProvider } from '@mui/material/styles';
import CssBaseline from '@mui/material/CssBaseline';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import Container from '@mui/material/Container';
import { useStyles } from '../../styles/dashboard';
import Footer from '../../commons/Dashboard/Footer';
import CoordinatorAppBar from '../../components/Navigation/CoordinatorAppBar';
import Typography from '@mui/material/Typography';
import ProfileTab from '../../commons/Dashboard/ProfileTab';

function DashboardContent() {

  const [open, setOpen] = React.useState(true);
  const toggleDrawer = () => {
    setOpen(!open);
  };
  const classes = useStyles();
  const mdTheme = createTheme();


  return (
    <ThemeProvider theme={mdTheme}>
      <Box sx={{ display: 'flex' }} >
        <CssBaseline />

       
        {/* Side Bar and Top Bar */}
        <CoordinatorAppBar classes={classes} />

        <Box
          component="main"
          sx={{
            backgroundColor: (theme) =>
              theme.palette.mode === 'light'
                ? theme.palette.grey[100]
                : theme.palette.grey[900],
            flexGrow: 1,
            height: '100vh',
            overflow: 'auto',
          }}
        >
          <Toolbar />
          <Container maxWidth="lg" sx={{ mt: 4, mb: 4 }} >
          <Typography
            component="h1"
            variant="h6"
            color="inherit"
            noWrap
            sx={{ fontWeight: 'bold', m: 1 }}
          >
            Coordinator Profile
          </Typography>
           
          <Box sx={{ mt: 6 }} /> 
        <ProfileTab  classes={classes}/>
          <Box sx={{ mb: 15 }} />

          <Footer classes={classes} />
          </Container>
        </Box>
        
      </Box>

    </ThemeProvider>
  );
}

export default function Profile() {
  return <DashboardContent />;
}

if(document.getElementById('coordinator-profile')) {
  ReactDOM.render(<DashboardContent/>, document.getElementById('coordinator-profile'));
}