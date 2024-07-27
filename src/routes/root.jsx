import { matchPath, useLocation } from "react-router-dom"
import BookManager from "./BookManager";

export default function Root() {
  const location = useLocation();
  const match = matchPath({ path: '/wp-admin/admin.php', exact: true }, location.pathname);
  const page = new URLSearchParams(location.search).get('page');

  switch (page) {
    case 'book-manager':
      return <BookManager/>;
    case 'add-book-record':
      return '<SettingsPage />';
  }
}