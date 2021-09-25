import React from 'react';
import TextField from '@material-ui/core/TextField';
import { IconButton, InputAdornment, FormControl, Box, Typography} from '@material-ui/core';
import { Visibility, VisibilityOff } from '@mui/icons-material';

const Signup = ({
        role,
        handleEmail,
        handlePsswd,
        values,
        classes,
        handleClickShowPassword,
        handleMouseDownPassword
    }) => {
    return (
        <Box pt={6}>
            <Typography component="h2" variant="subtitle2">
                Sign In as TUP-T {role}
            </Typography>
            <FormControl fullWidth size="medium">
                <TextField
                    id="email"
                    name="email"
                    label="Email Address"
                    variant="filled" 
                    margin="normal"
                    required
                    fullWidth
                    autoFocus
                    onChange={handleEmail}
                    className={classes.multilineColor}
                    autoComplete="email"
                    inputProps={{
                        className: classes.input,
                        className: classes.multilineColor
                    }}
                    />

                <TextField
                    id="password"
                    name="password"
                    variant="filled"
                    label="Password"
                    margin="normal"
                    type={values.showPassword ? 'text' : 'password'}
                    value={values.password}
                    required
                    fullWidth
                    onChange={handlePsswd}
                    className={classes.multilineColor}
                    InputProps={{
                        className: classes.input,
                        className: classes.multilineColor,
                        endAdornment: (
                            <InputAdornment position="end">
                                <IconButton
                                    aria-label="toggle password visibility"
                                    onClick={handleClickShowPassword}
                                    onMouseDown={handleMouseDownPassword}
                                    edge="end"
                                    >
                                    {values.showPassword ? <VisibilityOff /> : <Visibility />}
                                </IconButton>
                            </InputAdornment>
                        )
                    }}
                    />
            </FormControl>
        </Box>
    );
}
 
export default Signup;