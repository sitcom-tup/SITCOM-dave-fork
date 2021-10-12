import * as React from 'react';
import Toolbar from '@mui/material/Toolbar';
import Typography from '@mui/material/Typography';
import IconButton from '@mui/material/IconButton';
import LogoutIcon from '@mui/icons-material/Logout';
import NotificationsIcon from '@mui/icons-material/Notifications';
import MuiAppBar from '@mui/material/AppBar';
import MuiDrawer from '@mui/material/Drawer';
import List from '@mui/material/List';
import Divider from '@mui/material/Divider';
import ChevronLeftIcon from '@mui/icons-material/ChevronLeft';
import { mainListItems, secondaryListItems } from '../NavItems/listItems';
import { styled, createTheme } from '@mui/material/styles';
import { useStyles } from '../../styles/dashboard';
import User from '../../commons/Dashboard/User'



export default function CoordinatorAppBar() {
  const classes = useStyles();
  const [open, setOpen] = React.useState(true);
  const toggleDrawer = () => {
    setOpen(!open);
  };
  const drawerWidth = 240;
  const AppBar = styled(MuiAppBar, {
    shouldForwardProp: (prop) => prop !== 'open',
  })(({ theme, open }) => ({
    zIndex: theme.zIndex.drawer + 1,
    transition: theme.transitions.create(['width', 'margin'], {
      easing: theme.transitions.easing.sharp,
      duration: theme.transitions.duration.leavingScreen,
    }),
    ...(open && {
      marginLeft: drawerWidth,
      width: `calc(100% - ${drawerWidth}px)`,
      transition: theme.transitions.create(['width', 'margin'], {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.enteringScreen,
      }),
    }),
  }));
  
const Drawer = styled(MuiDrawer, { shouldForwardProp: (prop) => prop !== 'open' })(
  ({ theme, open }) => ({
    '& .MuiDrawer-paper': {
      position: 'relative',
      whiteSpace: 'nowrap',
      width: drawerWidth,
      transition: theme.transitions.create('width', {
        easing: theme.transitions.easing.sharp,
        duration: theme.transitions.duration.enteringScreen,
      }),
      boxSizing: 'border-box',
      ...(!open && {
        overflowX: 'hidden',
        transition: theme.transitions.create('width', {
          easing: theme.transitions.easing.sharp,
          duration: theme.transitions.duration.leavingScreen,
        }),
        width: theme.spacing(7),
        [theme.breakpoints.up('sm')]: {
          width: theme.spacing(9),
        },
      }),
    },
  }),
);
const mdTheme = createTheme();
  return (
    <>

    {/* Top Navigation */}
    <AppBar position="absolute" open={open}> 
     <div className={classes.navbar}>
        <Toolbar
          sx={{
            pr: '24px', // keep right padding when drawer closed
          }}
        >                    
         <Typography
            component="h1"
            variant="h6"
            color="inherit"
            noWrap
            sx={{ flexGrow: 1 }}
          >
          </Typography>

          <IconButton style={{ color: 'white' }}>
             <NotificationsIcon />
          </IconButton>
          <IconButton style={{ color: 'white' }}>
             <LogoutIcon />
          </IconButton>
      
        </Toolbar>
      </div>
    </AppBar>
    
    {/* Side Navigation */}
     <Drawer variant="permanent" open={open} >
        <div className={classes.sidebar}>
         
          <Toolbar
            sx={{
              display: 'flex',
              alignItems: 'center',
              justifyContent: 'flex-end',
              px: [1],
            }}
          >
            <div>
            <img className={classes.logo} alt="complex" src="/pictures/SITCOM_Logo.png" />
            </div>
         
            <IconButton onClick={toggleDrawer}>
              <ChevronLeftIcon />
            </IconButton>
              
          </Toolbar>

          {/* User Name and User Type */}
          <User />

          <Divider />
          <List>{mainListItems}</List>
          <Divider />
          <List>{secondaryListItems}</List>
          
          </div>
        </Drawer>
      
    </>
  );
}