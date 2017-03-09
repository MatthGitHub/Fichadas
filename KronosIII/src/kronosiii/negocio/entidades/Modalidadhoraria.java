/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio.entidades;

import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "MODALIDADHORARIA")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Modalidadhoraria.findAll", query = "SELECT m FROM Modalidadhoraria m"),
    @NamedQuery(name = "Modalidadhoraria.findByIdModalidad", query = "SELECT m FROM Modalidadhoraria m WHERE m.idModalidad = :idModalidad"),
    @NamedQuery(name = "Modalidadhoraria.findByDescripcion", query = "SELECT m FROM Modalidadhoraria m WHERE m.descripcion = :descripcion"),
    @NamedQuery(name = "Modalidadhoraria.findByLunes", query = "SELECT m FROM Modalidadhoraria m WHERE m.lunes = :lunes"),
    @NamedQuery(name = "Modalidadhoraria.findByMartes", query = "SELECT m FROM Modalidadhoraria m WHERE m.martes = :martes"),
    @NamedQuery(name = "Modalidadhoraria.findByMiercoles", query = "SELECT m FROM Modalidadhoraria m WHERE m.miercoles = :miercoles"),
    @NamedQuery(name = "Modalidadhoraria.findByJueves", query = "SELECT m FROM Modalidadhoraria m WHERE m.jueves = :jueves"),
    @NamedQuery(name = "Modalidadhoraria.findByViernes", query = "SELECT m FROM Modalidadhoraria m WHERE m.viernes = :viernes"),
    @NamedQuery(name = "Modalidadhoraria.findBySabado", query = "SELECT m FROM Modalidadhoraria m WHERE m.sabado = :sabado"),
    @NamedQuery(name = "Modalidadhoraria.findByDomingo", query = "SELECT m FROM Modalidadhoraria m WHERE m.domingo = :domingo"),
    @NamedQuery(name = "Modalidadhoraria.findByLe", query = "SELECT m FROM Modalidadhoraria m WHERE m.le = :le"),
    @NamedQuery(name = "Modalidadhoraria.findByLs", query = "SELECT m FROM Modalidadhoraria m WHERE m.ls = :ls"),
    @NamedQuery(name = "Modalidadhoraria.findByMe", query = "SELECT m FROM Modalidadhoraria m WHERE m.me = :me"),
    @NamedQuery(name = "Modalidadhoraria.findByMs", query = "SELECT m FROM Modalidadhoraria m WHERE m.ms = :ms"),
    @NamedQuery(name = "Modalidadhoraria.findByMie", query = "SELECT m FROM Modalidadhoraria m WHERE m.mie = :mie"),
    @NamedQuery(name = "Modalidadhoraria.findByMis", query = "SELECT m FROM Modalidadhoraria m WHERE m.mis = :mis"),
    @NamedQuery(name = "Modalidadhoraria.findByJe", query = "SELECT m FROM Modalidadhoraria m WHERE m.je = :je"),
    @NamedQuery(name = "Modalidadhoraria.findByJs", query = "SELECT m FROM Modalidadhoraria m WHERE m.js = :js"),
    @NamedQuery(name = "Modalidadhoraria.findByVe", query = "SELECT m FROM Modalidadhoraria m WHERE m.ve = :ve"),
    @NamedQuery(name = "Modalidadhoraria.findByVs", query = "SELECT m FROM Modalidadhoraria m WHERE m.vs = :vs"),
    @NamedQuery(name = "Modalidadhoraria.findBySe", query = "SELECT m FROM Modalidadhoraria m WHERE m.se = :se"),
    @NamedQuery(name = "Modalidadhoraria.findBySs", query = "SELECT m FROM Modalidadhoraria m WHERE m.ss = :ss"),
    @NamedQuery(name = "Modalidadhoraria.findByDe", query = "SELECT m FROM Modalidadhoraria m WHERE m.de = :de"),
    @NamedQuery(name = "Modalidadhoraria.findByDs", query = "SELECT m FROM Modalidadhoraria m WHERE m.ds = :ds"),
    @NamedQuery(name = "Modalidadhoraria.findByLiberado", query = "SELECT m FROM Modalidadhoraria m WHERE m.liberado = :liberado")})
public class Modalidadhoraria implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdModalidad")
    private Integer idModalidad;
    @Column(name = "Descripcion")
    private String descripcion;
    @Column(name = "Lunes")
    private Integer lunes;
    @Column(name = "Martes")
    private Integer martes;
    @Column(name = "Miercoles")
    private Integer miercoles;
    @Column(name = "Jueves")
    private Integer jueves;
    @Column(name = "Viernes")
    private Integer viernes;
    @Column(name = "Sabado")
    private Integer sabado;
    @Column(name = "Domingo")
    private Integer domingo;
    @Column(name = "LE")
    private String le;
    @Column(name = "LS")
    private String ls;
    @Column(name = "ME")
    private String me;
    @Column(name = "MS")
    private String ms;
    @Column(name = "MIE")
    private String mie;
    @Column(name = "MIS")
    private String mis;
    @Column(name = "JE")
    private String je;
    @Column(name = "JS")
    private String js;
    @Column(name = "VE")
    private String ve;
    @Column(name = "VS")
    private String vs;
    @Column(name = "SE")
    private String se;
    @Column(name = "SS")
    private String ss;
    @Column(name = "DE")
    private String de;
    @Column(name = "DS")
    private String ds;
    @Column(name = "Liberado")
    private Boolean liberado;

    public Modalidadhoraria() {
    }

    public Modalidadhoraria(Integer idModalidad) {
        this.idModalidad = idModalidad;
    }

    public Integer getIdModalidad() {
        return idModalidad;
    }

    public void setIdModalidad(Integer idModalidad) {
        this.idModalidad = idModalidad;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public Integer getLunes() {
        return lunes;
    }

    public void setLunes(Integer lunes) {
        this.lunes = lunes;
    }

    public Integer getMartes() {
        return martes;
    }

    public void setMartes(Integer martes) {
        this.martes = martes;
    }

    public Integer getMiercoles() {
        return miercoles;
    }

    public void setMiercoles(Integer miercoles) {
        this.miercoles = miercoles;
    }

    public Integer getJueves() {
        return jueves;
    }

    public void setJueves(Integer jueves) {
        this.jueves = jueves;
    }

    public Integer getViernes() {
        return viernes;
    }

    public void setViernes(Integer viernes) {
        this.viernes = viernes;
    }

    public Integer getSabado() {
        return sabado;
    }

    public void setSabado(Integer sabado) {
        this.sabado = sabado;
    }

    public Integer getDomingo() {
        return domingo;
    }

    public void setDomingo(Integer domingo) {
        this.domingo = domingo;
    }

    public String getLe() {
        return le;
    }

    public void setLe(String le) {
        this.le = le;
    }

    public String getLs() {
        return ls;
    }

    public void setLs(String ls) {
        this.ls = ls;
    }

    public String getMe() {
        return me;
    }

    public void setMe(String me) {
        this.me = me;
    }

    public String getMs() {
        return ms;
    }

    public void setMs(String ms) {
        this.ms = ms;
    }

    public String getMie() {
        return mie;
    }

    public void setMie(String mie) {
        this.mie = mie;
    }

    public String getMis() {
        return mis;
    }

    public void setMis(String mis) {
        this.mis = mis;
    }

    public String getJe() {
        return je;
    }

    public void setJe(String je) {
        this.je = je;
    }

    public String getJs() {
        return js;
    }

    public void setJs(String js) {
        this.js = js;
    }

    public String getVe() {
        return ve;
    }

    public void setVe(String ve) {
        this.ve = ve;
    }

    public String getVs() {
        return vs;
    }

    public void setVs(String vs) {
        this.vs = vs;
    }

    public String getSe() {
        return se;
    }

    public void setSe(String se) {
        this.se = se;
    }

    public String getSs() {
        return ss;
    }

    public void setSs(String ss) {
        this.ss = ss;
    }

    public String getDe() {
        return de;
    }

    public void setDe(String de) {
        this.de = de;
    }

    public String getDs() {
        return ds;
    }

    public void setDs(String ds) {
        this.ds = ds;
    }

    public Boolean getLiberado() {
        return liberado;
    }

    public void setLiberado(Boolean liberado) {
        this.liberado = liberado;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idModalidad != null ? idModalidad.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Modalidadhoraria)) {
            return false;
        }
        Modalidadhoraria other = (Modalidadhoraria) object;
        if ((this.idModalidad == null && other.idModalidad != null) || (this.idModalidad != null && !this.idModalidad.equals(other.idModalidad))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Modalidadhoraria[ idModalidad=" + idModalidad + " ]";
    }
    
}
