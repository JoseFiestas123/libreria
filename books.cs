using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Libreria
{
    #region Books
    public class Books
    {
        #region Member Variables
        protected int _id;
        protected int _codigo;
        protected string _title;
        protected string _autor;
        protected string _tema;
        protected string _carrera;
        #endregion
        #region Constructors
        public Books() { }
        public Books(int codigo, string title, string autor, string tema, string carrera)
        {
            this._codigo=codigo;
            this._title=title;
            this._autor=autor;
            this._tema=tema;
            this._carrera=carrera;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual int Codigo
        {
            get {return _codigo;}
            set {_codigo=value;}
        }
        public virtual string Title
        {
            get {return _title;}
            set {_title=value;}
        }
        public virtual string Autor
        {
            get {return _autor;}
            set {_autor=value;}
        }
        public virtual string Tema
        {
            get {return _tema;}
            set {_tema=value;}
        }
        public virtual string Carrera
        {
            get {return _carrera;}
            set {_carrera=value;}
        }
        #endregion
    }
    #endregion
}