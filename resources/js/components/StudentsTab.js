import * as React from 'react';
import Paper from '@mui/material/Paper';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TablePagination from '@mui/material/TablePagination';
import TableRow from '@mui/material/TableRow';

const columns = [
  { id: 'fname', label: 'Firstname', minWidth: 170 },
  { id: 'lname', label: 'Lastname', minWidth: 100 },
  {
    id: 'company',
    label: 'Company',
    minWidth: 170,
    align: 'right',
   
  },
  {
    id: 'address',
    label: 'Address',
    minWidth: 170,
    align: 'right',
    format: (value) => value.toLocaleString('en-US'),
  },
 
];

function createData(fname, lname, company, address) {

  return { fname, lname, company, address };
}

const rows = [
  createData('Justin', 'Drake', 'Oracle', 'Taguig'),
  createData('Ben', 'Drake', 'Oracle', 'Taguig'),
  createData('Jay', 'Drake', 'Oracle', 'Taguig'),
  createData('John', 'Drake', 'Oracle', 'Taguig'),
  createData('Dave', 'Drake', 'Oracle', 'Taguig'),
  createData('Harold', 'Drake', 'Oracle', 'Taguig'),
  createData('Alex', 'Drake', 'Oracle', 'Taguig'),
  createData('Ejay', 'Drake', 'Oracle', 'Makati'),
  createData('Drake', 'Drake', 'Oracle', 'Makati'),
  createData('Johan', 'Drake', 'Oracle', 'Makati'),
  createData('Dwayne', 'Drake', 'Oracle', 'Makati'),
  createData('Reina', 'Drake', 'Oracle', 'Makati'),
  createData('Ron', 'Drake', 'Oracle', 'Makati'),
  createData('Nina', 'Drake', 'Oracle', 'Makati'),
  createData('Braze', 'Drake', 'Oracle', 'Makati'),
];

export default function StickyHeadTable() {
  const [page, setPage] = React.useState(0);
  const [rowsPerPage, setRowsPerPage] = React.useState(10);

  const handleChangePage = (event, newPage) => {
    setPage(newPage);
  };

  const handleChangeRowsPerPage = (event) => {
    setRowsPerPage(+event.target.value);
    setPage(0);
  };

  return (
    <Paper sx={{ width: '100%', overflow: 'hidden' }}>
      <TableContainer sx={{ maxHeight: 440 }}>
        <Table stickyHeader aria-label="sticky table">
          <TableHead>
            <TableRow>
              {columns.map((column) => (
                <TableCell
                  key={column.id}
                  align={column.align}
                  style={{ minWidth: column.minWidth }}
                >
                  {column.label}
                </TableCell>
              ))}
            </TableRow>
          </TableHead>
          <TableBody>
            {rows
              .slice(page * rowsPerPage, page * rowsPerPage + rowsPerPage)
              .map((row) => {
                return (
                  <TableRow hover role="checkbox" tabIndex={-1} key={row.code}>
                    {columns.map((column) => {
                      const value = row[column.id];
                      return (
                        <TableCell key={column.id} align={column.align}>
                          {column.format && typeof value === 'number'
                            ? column.format(value)
                            : value}
                        </TableCell>
                      );
                    })}
                  </TableRow>
                );
              })}
          </TableBody>
        </Table>
      </TableContainer>
      <TablePagination
        rowsPerPageOptions={[10, 25, 100]}
        component="div"
        count={rows.length}
        rowsPerPage={rowsPerPage}
        page={page}
        onPageChange={handleChangePage}
        onRowsPerPageChange={handleChangeRowsPerPage}
      />
    </Paper>
  );
}