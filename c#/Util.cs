using System;
using System.IO;
using System.Security.Cryptography;
using System.Text;

namespace WebMd5
{
    public class Util
    {
        private static DESCryptoServiceProvider getDesProvider(string k)
        {
            var des = new DESCryptoServiceProvider();

            if (!string.IsNullOrEmpty(k))
            {
                des.IV = des.Key = Encoding.ASCII.GetBytes(System.Web.Security.FormsAuthentication.HashPasswordForStoringInConfigFile(k, "md5").Substring(0, 8));
            }

            return des;
        }

        /// <summary>
        /// 加密
        /// </summary>
        public static string Encrypt(string str, string k)
        {
            if (string.IsNullOrEmpty(str)) return str;
            var des = getDesProvider(k);
            var inputByteArray = Encoding.Default.GetBytes(str);
            var ms = new MemoryStream();
            var cs = new CryptoStream(ms, des.CreateEncryptor(), CryptoStreamMode.Write);
            cs.Write(inputByteArray, 0, inputByteArray.Length);
            cs.FlushFinalBlock();
            var ret = new StringBuilder();
            foreach (byte b in ms.ToArray())
            {
                ret.AppendFormat("{0:X2}", b);
            }
            return ret.ToString();
        }

        /// <summary>
        /// 解密
        /// </summary>
        public static string Decrypt(string str, string k = null)
        {
            if (string.IsNullOrEmpty(str)) return str;
            try
            {
                var des = getDesProvider(k);
                var len = str.Length / 2;
                var inputByteArray = new byte[len];
                for (var x = 0; x < len; x++)
                {
                    var i = Convert.ToInt32(str.Substring(x * 2, 2), 16);
                    inputByteArray[x] = (byte)i;
                }
                var ms = new MemoryStream();
                var cs = new CryptoStream(ms, des.CreateDecryptor(), CryptoStreamMode.Write);
                cs.Write(inputByteArray, 0, inputByteArray.Length);
                cs.FlushFinalBlock();
                return Encoding.Default.GetString(ms.ToArray());
            }
            catch
            {
                throw new Exception("解密失败");
            }
        }
    }
}