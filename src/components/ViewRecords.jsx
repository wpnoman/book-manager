import { Card, Typography, Button } from "@material-tailwind/react";
import { deleteRecord } from "../api/apiQuery";
import { useNavigate } from "react-router-dom";


export function ViewRecords({ tableRows }) {



  const TABLE_HEAD = ["id", "Title", "Author", "Publisher", "ISBN", "Publication", "Action"];
  const navigate = useNavigate();

  /// delete item
  const deleteItem = (book_id, e) => {
    deleteRecord(book_id).then((res) => {
      if (res == true) {
        console.log('Item Deleted');
        e.target.closest('tr').remove()
      }
    });
  }

  const editItem = (book_id) => {
    navigate("/wp-admin/admin.php?page=book-manager&book_id="+book_id);
  }


  return (
    <Card className="h-full w-full overflow-scroll mt-4">
      <table className="w-full min-w-max table-auto text-left">
        <thead>
          <tr>
            {TABLE_HEAD.map((head) => (
              <th
                key={head}
                className="border-b border-blue-gray-100 bg-neutral-950 text-white p-4"
              >
                <Typography
                  variant="small"
                  color="blue-gray"
                  className="font-normal leading-none opacity-70"
                >
                  {head}
                </Typography>
              </th>
            ))}
          </tr>
        </thead>

        <tbody>
          {tableRows.map(({ book_id, title, author, publisher, ISBN, publication_date }, index) => {
            const isLast = index === tableRows.length - 1;
            const classes = isLast ? "p-4" : "p-4 border-b border-blue-gray-50";

            return (
              <tr key={book_id}>

                <td className={classes}>
                  <Typography
                    variant="small"
                    color="blue-gray"
                    className="font-normal"
                  >
                    {book_id}
                  </Typography>
                </td>

                <td className={classes}>
                  <Typography
                    variant="small"
                    color="blue-gray"
                    className="font-normal"
                  >
                    {title}
                  </Typography>
                </td>

                <td className={classes}>
                  <Typography
                    variant="small"
                    color="blue-gray"
                    className="font-normal"
                  >
                    {author}
                  </Typography>
                </td>

                <td className={classes}>
                  <Typography
                    variant="small"
                    color="blue-gray"
                    className="font-normal"
                  >
                    {publisher}
                  </Typography>
                </td>

                <td className={classes}>
                  <Typography
                    variant="small"
                    color="blue-gray"
                    className="font-normal"
                  >
                    {ISBN}
                  </Typography>
                </td>

                <td className={classes}>
                  <Typography
                    variant="small"
                    color="blue-gray"
                    className="font-normal"
                  >
                    {publication_date}
                  </Typography>
                </td>

                <td className={classes}>
                  <div className="flex gap-4">
                    <Button color="red" onClick={(e) => deleteItem(book_id, e)}>Delete</Button>
                    <Button onClick={(e) => editItem(book_id)}>Edit</Button>
                  </div>
                </td>

              </tr>
            );
          })}
        </tbody>
      </table>
    </Card>
  );
}