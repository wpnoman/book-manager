import { matchPath, useLocation } from "react-router-dom"

export default function Root() {
  const location = useLocation();
  const match = matchPath({ path: '/wp-admin/admin.php', exact: true }, location.pathname);
  const page = new URLSearchParams(location.search).get('page');

  console.log(page);

  switch (page) {
    case 'book-manager':
      return '<HomePage />';
    case 'add-book-record':
      return '<SettingsPage />';

  }
}