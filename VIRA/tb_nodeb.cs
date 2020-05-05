using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Db_manage
{
    #region Tb_nodeb
    public class Tb_nodeb
    {
        #region Member Variables
        protected string _nodeb_id;
        protected string _sto;
        protected string _odp;
        #endregion
        #region Constructors
        public Tb_nodeb() { }
        public Tb_nodeb(string sto, string odp)
        {
            this._sto=sto;
            this._odp=odp;
        }
        #endregion
        #region Public Properties
        public virtual string Nodeb_id
        {
            get {return _nodeb_id;}
            set {_nodeb_id=value;}
        }
        public virtual string Sto
        {
            get {return _sto;}
            set {_sto=value;}
        }
        public virtual string Odp
        {
            get {return _odp;}
            set {_odp=value;}
        }
        #endregion
    }
    #endregion
}