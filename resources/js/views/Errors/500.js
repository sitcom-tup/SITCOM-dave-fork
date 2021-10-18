import Template from './Template'
import Box from '@mui/material/Box'
import Divider from '@mui/material/Divider'
import Typography from '@mui/material/Typography'
import ErrorIcon from '@mui/icons-material/Error';
import Grid from '@mui/material/Grid'

const ERR500 = (props) => {
    return (
        <Template>
            <Box sx={{pt:3,pb:3}}>
                <Grid
                  container
                  spacing={2}
                  direction="column"
                  justifyContent="center"
                  alignItems="center"
                  alignContent="center"
                  wrap="wrap"
                  
                >
                  <Grid item>
                    <Typography variant="h3" gutterBottom>
                        <ErrorIcon sx={{fontSize:30, justifyContent:'center'}}/> {props.status}
                    </Typography>
                    <Divider variant="middle"/>
                  </Grid>
                  <Grid item>
                    <Typography variant="body1" color="initial">
                        {props.message}
                    </Typography>
                    <Typography variant="subtitle" color="initial">
                        This should be reported immediately. Please click the button below.
                    </Typography>
                  </Grid>
                </Grid>
            </Box>  
        </Template>
    );
}
 
export default ERR500;