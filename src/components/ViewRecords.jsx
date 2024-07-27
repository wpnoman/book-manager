import { Card, Typography, Button } from "@material-tailwind/react";

const TABLE_HEAD = ["id", "Title", "Author", "Publisher", "ISBN", "Publication", "Action"];

const TABLE_ROWS = [
  {
    id:  11,
    title: "John Michael",
    author : "Manager",
    publisher : "Manager",
    isbn : 232302-23232-23234,
    publication_date: "23/04/18",
  },
  {
    id:  12,
    title: "John Michael",
    author : "Manager",
    publisher : "Manager",
    isbn : 232302-23232-23234,
    publication_date: "23/04/18",
  },
  {
    id:  13,
    title: "John Michael",
    author : "Manager",
    publisher : "Manager",
    isbn : 232302-23232-23234,
    publication_date: "23/04/18",
  },
  {
    id:  14,
    title: "John Michael",
    author : "Manager",
    publisher : "Manager",
    isbn : 232302-23232-23234,
    publication_date: "23/04/18",
  },
  {
    id:  15,
    title: "John Michael",
    author : "Manager",
    publisher : "Manager",
    isbn : 232302-23232-23234,
    publication_date: "23/04/18",
  },
];

export function ViewRecords() {
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
          {TABLE_ROWS.map(({ id, title, author, publisher, isbn, publication_date }, index) => {
            const isLast = index === TABLE_ROWS.length - 1;
            const classes = isLast ? "p-4" : "p-4 border-b border-blue-gray-50";

            return (
              <tr key={id}>

                <td className={classes}>
                  <Typography
                    variant="small"
                    color="blue-gray"
                    className="font-normal"
                  >
                    {id}
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
                    {isbn}
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
                    <Button color="red">Delete</Button>
                    <Button>Edit</Button>
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