import Grid from '@mui/material/Grid'
import Box from '@mui/material/Box'
import Paper from '@mui/material/Paper'

const LeftImage = ({classes}) => {
    return (
        <Grid item xs={12} sm={12} md={12} lg={6}>
            <Box mt={10} mb={10} sx={{...classes.leftImage}}>
                <Paper elevation={10} sx={{...classes.paperLeftImage}}/>
            </Box>
        </Grid>
    );
}
 
export default LeftImage;