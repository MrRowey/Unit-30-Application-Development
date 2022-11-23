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
using MaterialDesignThemes.Wpf;
using MySql.Data.MySqlClient;

namespace NHS_CALL_APP
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }











        // Dark Theme
        public bool IsDarkTheme { get; set; }
        private readonly PaletteHelper paletteHelper = new PaletteHelper();
        private void toggleTheme(object sender, RoutedEventArgs e)
        {
            ITheme theme = paletteHelper.GetTheme();
            if (IsDarkTheme = theme.GetBaseTheme() == BaseTheme.Dark)
            {
                IsDarkTheme= false;
                theme.SetBaseTheme(Theme.Light);
            }
            else
            {
                IsDarkTheme= true;
                theme.SetBaseTheme(Theme.Dark);
            }
            paletteHelper.SetTheme(theme);
        }


        
        // Button Clicks
        private void exitApp(object sender, RoutedEventArgs e)
        {
            Application.Current.Shutdown();
        }


        private void Login_Load(object sender, EventArgs e)
        {


            cn = new MySqlConnection();

        }


        private void loginBtn_Click(object sender, EventArgs e)
        {
            if(txtPassword.Password != string.Empty || txtUsername.Text != string.Empty)
            {
                cmd = new MySqlCommand("Select * from Accounts where username='" + txtUsername.Text + "' and password="+txtPassword.Password+"'", cn);

            }
       
            
            
            
            // Login to App
            //Menu dashboard = new Menu();
            //dashboard.Show();
            //this.Close();

        }



        // Allows window to be dragged
        protected override void OnMouseLeftButtonDown(MouseButtonEventArgs e)
        {
            base.OnMouseLeftButtonDown(e);
            DragMove();
        }


    }
}
