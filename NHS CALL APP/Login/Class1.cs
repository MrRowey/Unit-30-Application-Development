using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data;
using MySql.Data.MySqlClient;

namespace NHS_CALL_APP.Login
{
    public class Config
    {
        string ConnStr = "";
        public MySqlConnection connection = null;
        public string server = ""; //MySQL Host / IP
        public string user = ""; // MySQl User
        public string password = ""; // MySQl Pass
    }
}
