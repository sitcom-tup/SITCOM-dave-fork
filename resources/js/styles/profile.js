import makeStyles from '@mui/styles/makeStyles';

const useStyles = makeStyles((theme) => ({
    body: { background: "#fff", marginTop: "20px" },
    ".card": {
      position: "relative",
      display: "flex",
      flexDirection: "column",
      minWidth: "0",
      wordWrap: "break-word",
      backgroundColor: "#fff",
      backgroundClip: "border-box",
      border: "0 solid transparent",
      borderRadius: ".25rem",
      marginBottom: "1.5rem",
      boxShadow:
        "0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%)"
    },
    ".me-2": { marginRight: ".5rem !important" }


  
}));

  export {useStyles};