import Template from './Template'
import Box from '@mui/material/Box'
import Divider from '@mui/material/Divider'
import Typography from '@mui/material/Typography'
import ReportProblemIcon from '@mui/icons-material/ReportProblem';

const ERR404 = (props) => {
    return (
        <Template>
            <Box sx={{pt:3,pb:3,justifyContent:'center'}}>
                <Typography variant="h3" gutterBottom component="div">
                    <ReportProblemIcon sx={{fontSize:30}}/> {props.status}
                </Typography>
                <Divider variant="middle" />
                <Typography variant="body1" color="initial">
                    {props.message}
                </Typography>
                <Typography variant="subtitle" color="initial">
                    The page you have requested cannot be found or has been moved on another location.
                </Typography>
            </Box>  
        </Template>
    );
}
 
export default ERR404;