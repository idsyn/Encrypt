using System;
using System.IO;
using System.Security.Cryptography;
using System.Text;
using System.Web.UI;

namespace WebMd5
{
    public partial class index : Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnMd5_Click(object sender, EventArgs e)
        {
            var result = string.Empty;
            try
            {
                result = Util.Decrypt(txtdata.Text.Trim(), txtkey.Text.Trim());
            }
            catch (Exception ex)
            {
                Response.Write("<script>alert('" + ex.Message + "');</script>");
            }

            txtresult.Text = result;
        }

        protected void btnMd5_1_Click(object sender, EventArgs e)
        {
            var result = string.Empty;
            try
            {
                result = Util.Encrypt(txtdata.Text.Trim(), txtkey.Text.Trim());
            }
            catch (Exception ex)
            {
                Response.Write("<script>alert('" + ex.Message + "');</script>");
            }

            txtresult.Text = result;
        }
    }
}