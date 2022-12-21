using MaterialDesignThemes.Wpf;
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
using System.Windows.Shapes;
using System.Diagnostics;

namespace NHS_CALL_APP
{
    /// <summary>
    /// Interaction logic for Menu.xaml
    /// </summary>
    public partial class Menu : Window
    {
        public Menu()
        {
            InitializeComponent();
        }

        private void report_Click(object sender, RoutedEventArgs e)
        {
            // Opening up Report Window
            CallSystem callSystem = new CallSystem();
            callSystem.Show();
            Close();
        }

        private void userInfo_Click(object sender, RoutedEventArgs e)
        {

        }

        private void exitApp_Click(object sender, RoutedEventArgs e)
        {
            // Shut Down the Applciaion
            Application.Current.Shutdown();

        }
    }
}
