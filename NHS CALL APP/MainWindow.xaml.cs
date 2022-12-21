using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

//Using namespaces
using MaterialDesignThemes.Wpf;
using MySql.Data.MySqlClient;
using System.Configuration;

namespace NHS_CALL_APP
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        // Create Private Varables
        private string conn;
        private MySqlConnection connect;
        
        public MainWindow()
        {
            InitializeComponent();
        }
        
        // Create the Connection to the MySql Database
        private void db_connection()
        {
            try
            {
                conn = "server=localhost;database=accounts;uid=root;pwd=;";
                connect = new MySqlConnection(conn);
                connect.Open();
            }
            catch (MySqlException e)
            {
                throw e;
            }
        }

        // Checks that the Username & Passwords are in the database
        private bool validate_login(string user, string pass)
        {
            db_connection();
            MySqlCommand cmd = new MySqlCommand();
            cmd.CommandText = "Select * from desktop where username=@user and password=@pass";
            cmd.Parameters.AddWithValue("@user", user);
            cmd.Parameters.AddWithValue("@pass", pass);
            cmd.Connection = connect;
            MySqlDataReader login = cmd.ExecuteReader();
            if (login.Read())
            {
                connect.Close();
                return true;
            }
            else
            {
                connect.Close();
                return false;
            }
        }

        // runs the validaion check on login click to see if detaisl ented are correct.
        private void loginBtn_Click(object sender, EventArgs e)
        {
            string user = txtUsername.Text;
            string pass = txtPassword.Password;
            if (user == "" || pass == "")
            {
                MessageBox.Show("Please Enter both User ID and Password");
                return;
            }
            bool r = validate_login(user, pass);
            if (r)
            {
                Menu dashboard = new Menu();
                dashboard.Show();
                Close();
            }
            else
            {
                MessageBox.Show("incorrect login");
            }

        }

        // Button Clicks
        private void exitApp(object sender, RoutedEventArgs e)
        {
            Application.Current.Shutdown();
        }
          
        // Allows window to be dragged
        protected override void OnMouseLeftButtonDown(MouseButtonEventArgs e)
        {
            base.OnMouseLeftButtonDown(e);
            DragMove();
        }

    }
}
